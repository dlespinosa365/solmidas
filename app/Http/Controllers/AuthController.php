<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


class AuthController extends Controller
{
    //
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'company' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'lastname' => $fields['lastname'],
            'company' => $fields['company'],
            'phone' => $fields['phone'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'isAdmin' => false 
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $user->sendEmailVerificationNotification();
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return ResponseHelper::sendSuccess($response, 201);
    }

    public function verify(EmailVerificationRequest $request) {
        if ($request->user()->hasVerifiedEmail()) {
            $response = 'El correo ya fue verificado';
            return ResponseHelper::sendError($response, 400);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $response = [ 'verified'=> true ];
        return ResponseHelper::sendSuccess($response, 200);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return ResponseHelper::sendError('Credenciales invalidas', 403);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return ResponseHelper::sendSuccess($response, 200);
    }

    public function logout(Request $request) {
        $user = auth()->user();
        if ($user) {
            $user->tokens()->delete();
        }
        $response = [
            'message' => 'Sesion terminada'
        ];
        return ResponseHelper::sendSuccess($response, 200);
    }

    public function forgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            $response = [];
            return ResponseHelper::sendSuccess($response, 200);
        } 
        return ResponseHelper::sendError('El email no pudo ser enviado', 500);

    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                $user->tokens()->delete();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return ResponseHelper::sendSuccess([], 200);
        }

        return ResponseHelper::sendError('La contraseña no pudo ser reestablecida.', 500);

    }
}

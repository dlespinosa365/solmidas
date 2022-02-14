<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\LineController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// protected routes without email verification
Route::group(['middleware' => ['auth:sanctum']], function () {
    //auth
    Route::get('/auth/verify-email/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify');
    Route::get('/auth/logout', [AuthController::class, 'logout']);

    //structure
    Route::put('/structure/change-code/{id}', [StructureController::class, 'changeCode']);
    Route::post('/structure/store', [StructureController::class, 'store']);
    Route::get('/structure/show/{id}', [StructureController::class, 'show']);
    Route::get('/structure/edit', [StructureController::class, 'show']);
    Route::delete('/structure/destroy/{id}', [StructureController::class, 'destroy']);
    Route::get('/structure', [StructureController::class, 'index']);
});

// full protected routes for admin
Route::group(['middleware' => ['auth:sanctum', 'isAdmin']], function () {
    //auth
    Route::get('line/create', [LineController::class, 'create']);
    Route::get('line', [LineController::class, 'index']);
    Route::get('line/{id}', [LineController::class, 'show']);
    Route::post('line/create', [LineController::class, 'store']);
    Route::get('line/edit/{id}', [LineController::class, 'edit']);
    Route::put('line/edit/{id}', [LineController::class, 'update']);
    Route::delete('line/remove/{id}', [LineController::class, 'destroy']);
    
});

/** public routes */

//auth
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.reset');
Route::post('/auth/reset-password', [AuthController::class, 'reset']);


//structure 
Route::get('/structure/create', [StructureController::class, 'create']);
Route::put('/structure/lines', [StructureController::class, 'getLines']);
Route::get('/structure/publics', [StructureController::class, 'getPublicStructures']);





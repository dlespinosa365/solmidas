<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //master user
        $user = User::create([
            'name' => 'solmidas',
            'lastname' => 'solmidas',
            'company' => 'solmidas',
            'phone' => '',
            'email' => 'solmidas@solmidas.com',
            'password' => bcrypt('Solmidas123'),
            'isAdmin' => true 
        ]);

        $user->createToken('myapptoken')->plainTextToken;
        $user->markEmailAsVerified();

        //dev user
        $user = User::create([
            'name' => 'Denis',
            'lastname' => 'Espinosa',
            'company' => 'Indepent',
            'phone' => '+598 97439750',
            'email' => 'dlespinosa365@gmail.com',
            'password' => bcrypt('Testing123'),
            'isAdmin' => true 
        ]);

        $user->createToken('myapptoken')->plainTextToken;
        $user->markEmailAsVerified();


        // test common user    
        $user = User::create([
            'name' => 'test',
            'lastname' => 'Magan',
            'company' => 'Indepent',
            'phone' => '+598 97439750',
            'email' => 'test_user@gmail.com',
            'password' => bcrypt('Testing123'),
            'isAdmin' => false 
        ]);

        $user->createToken('myapptoken')->plainTextToken;
        $user->markEmailAsVerified();
    }
}

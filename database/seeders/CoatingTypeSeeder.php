<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoatingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coating_types')->insert([
            'name' => 'Panel Sandwich'
        ]);
        DB::table('coating_types')->insert([
            'name' => 'Panel Lana de Roca'
        ]);
        DB::table('coating_types')->insert([
            'name' => 'Tejas Simples'
        ]);
    }
}

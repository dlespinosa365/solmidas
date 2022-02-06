<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('land_categories')->insert([
            'name' => 'Terreno I',
            'description' => 'Área de maleza como césped, obstáculos aislados (árboles o edificios) con separaciones entre sí, de al menos 20 veces su altura.'
        ]);
        DB::table('land_categories')->insert([
            'name' => 'Terreno II',
            'description' => 'Área con una cubierta regular de vegetación o edificaciones, obstáculos aislados con separaciones máximas de 20 veces su altura, por ejemplo: poblados, áreas suburbanas, zonas industriales o bosques permanentes.'
        ]);
    }
}

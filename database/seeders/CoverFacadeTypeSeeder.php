<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoverFacadeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "Panel Sandwich"
            ],
            [
                "name" => "Panel Lana de Roca"
            ],
            [
                "name" => "Tejas Simples"
            ]
        ];
        foreach($data as $item) {
            DB::table('cover_facade_types')->insert($item);
        }
    }
}

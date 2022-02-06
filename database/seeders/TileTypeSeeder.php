<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TileTypeSeeder extends Seeder
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
                "name" => "Ondulada",
            ],
            [
                "name" => "Trapezoidal",
            ]
        ];
        foreach($data as $item) {
            DB::table('tile_types')->insert($item);
        }
    }
}

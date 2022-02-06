<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RigidFrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rigid_frames')->insert([
            'name' => '1',
        ]);
        DB::table('rigid_frames')->insert([
            'name' => '2',
        ]);
        DB::table('rigid_frames')->insert([
            'name' => '4',
        ]);
    }
}

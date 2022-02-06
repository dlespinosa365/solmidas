<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\RigidFrameSeeder;
use Database\Seeders\LandCategorySeeder;
use Database\Seeders\CoatingTypeSeeder;
use Database\Seeders\LineSeeder;
use Database\Seeders\LineCategorySeeder;
use Database\Seeders\WeightFrameSeeder;
use Database\Seeders\FoundationVolumeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TileTypeSeeder;
use Database\Seeders\CoverFacadeTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            RigidFrameSeeder::class,
            LandCategorySeeder::class,
            CoatingTypeSeeder::class,
            LineCategorySeeder::class,
            LineSeeder::class,
            WeightFrameSeeder::class,
            FoundationVolumeSeeder::class,
            UserSeeder::class,
            TileTypeSeeder::class,
            CoverFacadeTypeSeeder::class
        ]);
    }
}

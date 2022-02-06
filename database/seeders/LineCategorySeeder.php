<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('line_categories')->insert([
            'name' => 'Cimentaciones',
        ]);
        DB::table('line_categories')->insert([
            'name' => 'Estructuras metálicas principales',
        ]);
        DB::table('line_categories')->insert([
            'name' => 'Estructuras metálicas secundarias',
        ]);
        DB::table('line_categories')->insert([
            'name' => 'Cierre Metálico',
        ]);
        DB::table('line_categories')->insert([
            'name' => 'Accesorios',
        ]);
        
    }
}

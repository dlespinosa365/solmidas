<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoundationVolumeSeeder extends Seeder
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
                "distenceBetweenColumns" => 10,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 5,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 5,
                "total" => 1.536
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 5,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 5,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 6,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 6,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 6,
                "total" => 2.436
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 6,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 7,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 7,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 7,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 7,
                "total" => 4.416
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 8,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 8,
                "total" => 2.436
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 8,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 5,
                "distenceBetweenFrames" => 8,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 5,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 5,
                "total" => 1.536
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 5,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 5,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 5,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 5,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 5,
                "total" => 6.432
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 6,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 6,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 6,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 6,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 6,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 6,
                "total" => 6.432
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 6,
                "total" => 8.196
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 7,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 7,
                "total" => 2.112
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 7,
                "total" => 3.156
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 7,
                "total" => 4.416
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 7,
                "total" => 5.844
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 7,
                "total" => 7.7016
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 7,
                "total" => 9.8184
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 8,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 8,
                "total" => 2.436
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 8,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 8,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 8,
                "total" => 6.804
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 8,
                "total" => 8.9712
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 6,
                "distenceBetweenFrames" => 8,
                "total" => 11.4408
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 5,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 5,
                "total" => 1.536
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 5,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 5,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 5,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 5,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 5,
                "total" => 6.432
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 6,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 6,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 6,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 6,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 6,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 6,
                "total" => 6.432
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 6,
                "total" => 8.196
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 7,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 7,
                "total" => 2.112
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 7,
                "total" => 3.156
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 7,
                "total" => 4.416
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 7,
                "total" => 5.844
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 7,
                "total" => 7.7016
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 7,
                "total" => 9.8184
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 8,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 8,
                "total" => 2.436
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 8,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 8,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 8,
                "total" => 6.804
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 8,
                "total" => 8.9712
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 7,
                "distenceBetweenFrames" => 8,
                "total" => 11.4408
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 5,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 5,
                "total" => 1.536
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 5,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 5,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 5,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 5,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 5,
                "total" => 6.432
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 6,
                "total" => 1.284
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 6,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 6,
                "total" => 2.784
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 6,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 6,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 6,
                "total" => 6.432
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 6,
                "total" => 8.196
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 7,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 7,
                "total" => 2.112
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 7,
                "total" => 3.156
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 7,
                "total" => 4.416
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 7,
                "total" => 5.844
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 7,
                "total" => 7.7016
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 7,
                "total" => 9.8184
            ],
            [
                "distenceBetweenColumns" => 10,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 8,
                "total" => 1.812
            ],
            [
                "distenceBetweenColumns" => 15,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 8,
                "total" => 2.436
            ],
            [
                "distenceBetweenColumns" => 20,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 8,
                "total" => 3.552
            ],
            [
                "distenceBetweenColumns" => 25,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 8,
                "total" => 4.884
            ],
            [
                "distenceBetweenColumns" => 30,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 8,
                "total" => 6.804
            ],
            [
                "distenceBetweenColumns" => 35,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 8,
                "total" => 8.9712
            ],
            [
                "distenceBetweenColumns" => 40,
                "columnsHight" => 8,
                "distenceBetweenFrames" => 8,
                "total" => 11.4408
            ]
        ];
        foreach($data as $item) {
            DB::table('foundation_volumes')->insert($item);
        }
    }
}

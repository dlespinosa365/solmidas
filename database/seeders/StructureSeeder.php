<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Structure;
use App\Models\Media;

class StructureSeeder extends Seeder
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
                'description' => 'Precio Total/m² = 134,86 €/m². Nave con platibanda de 20m de ancho, 60m de largo y 6m de altura. Ejecución y fundición de Zapatas y Piso. Montaje de estructuras metálicas. Colocación y montaje de Cierre en Cubiertas y Fachadas de Panel Sándwich 40mm.',
                'title' => 'Viseu, Zona Urbana Industrial',
                'isPublic' => true,
                'user_id' => 1,
                'medias' => [
                    [
                        'name' => '1.jpg',
                        'path' => 'media/1.jpg'
                    ],
                    [
                        'name' => 'video1.mp4',
                        'path' => 'media/video1.mp4'
                    ],
                    [
                        'name' => '12.jpg',
                        'path' => 'media/12.jpg'
                    ],
                    [
                        'name' => '13.jpg',
                        'path' => 'media/13.jpg'
                    ]
                ]
            ],
            [
                'description' => 'Precio Total/m² = 113,52 €/m².
                Nave con platibanda de 25m de ancho, 40m de largo y 7m de altura.
                Montaje de estructuras metálicas.
                Colocación y montaje de Cierre en Cubiertas y Fachadas de Panel Sándwich 40mm.',
                'title' => 'Porto, Zona Urbana Industrial',
                'isPublic' => true,
                'user_id' => 1,
                'medias' => [
                    [
                        'name' => '2.jpg',
                        'path' => 'media/2.jpg'
                    ],
                    [
                        'name' => '21.jpg',
                        'path' => 'media/21.jpg'
                    ]
                ]
            ],
            [
                'description' => 'Precio Total/m² = 127,03 €/m².
                Nave sin platibanda de 20m de ancho, 60m de largo y 5m de altura.
                Ejecución y fundición de Zapatas y Piso.
                Montaje de estructuras metálicas.
                Colocación y montaje de Cierre en Cubiertas y Fachadas de Panel Sándwich 50mm.',
                'title' => 'Leiria, Zona Rural',
                'isPublic' => true,
                'user_id' => 1,
                'medias' => [
                    [
                        'name' => '3.jpg',
                        'path' => 'media/3.jpg'
                    ],
                    [
                        'name' => '31.jpg',
                        'path' => 'media/31.jpg'
                    ],
                    [
                        'name' => '32.jpg',
                        'path' => 'media/32.jpg'
                    ]
                ]
            ],
            [
                'description' => 'Precio Total/m² = 90,58 €/m².
                Nave sin platibanda de 40m de ancho, 60m de largo y 8m de altura.
                Ejecución y fundición de Zapatas y Piso.
                Montaje de estructuras metálicas.',
                'title' => 'Lisboa, Zona Industrial',
                'isPublic' => true,
                'user_id' => 1,
                'medias' => [
                    [
                        'name' => '4.jpg',
                        'path' => 'media/4.jpg'
                    ]
                ]
            ],
            [
                'description' => 'Precio Total/m² = 42,83 €/m².
                Nave sin platibanda de 30m de ancho, 80m de largo y 5m de altura.
                Suministro de Cierre en Cubiertas y Fachadas de Panel Sándwich 50mm.',
                'title' => 'Guarda, Zona Rural',
                'isPublic' => true,
                'user_id' => 1,
                'medias' => [
                    [
                        'name' => '5.jpg',
                        'path' => 'media/5.jpg'
                    ]
                ]
            ]
        ];
        foreach($data as $item) {
            $structure = Structure::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'isPublic' => $item['isPublic'],
                'user_id' => $item['user_id']
            ]);
            foreach($item['medias'] as $media) {
                $media['structure_id'] = $structure->id;
                Media::create($media);
            }

        }
    }
}

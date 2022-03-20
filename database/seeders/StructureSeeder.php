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
                'description_es' => 'Precio Total/m² = 134,86 €/m². Nave con platibanda de 20m de ancho, 60m de largo y 6m de altura. Ejecución y fundición de Zapatas y Piso. Montaje de estructuras metálicas. Colocación y montaje de Cierre en Cubiertas y Fachadas de Panel Sándwich 40mm.',
                'description_en' => 'Total Price/m² = €134.86/m². Ship with platiband 20m wide, 60m long and 6m high. Execution and foundry of Footings and Floor. Assembly of metal structures. Placement and assembly of Closure in Roofs and Facades of 40mm Sandwich Panel.',
                'description_pt' => 'Preço Total/m² = € 134,86/m². Navio com platibanda de 20m de largura, 60m de comprimento e 6m de altura. Execução e fundição de Sapatas e Piso. Montagem de estruturas metálicas. Colocação e montagem de Fechamento em Coberturas e Fachadas de Painel Sandwich 40mm.',
                'title_es' => 'Viseu, Zona Urbana Industrial',
                'title_en' => 'Viseu, Urban Industrial Zone',
                'title_pt' => 'Viseu, Zona Industrial Urbana',
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
                'description_es' => 'Precio Total/m² = 113,52 €/m². Nave con platibanda de 25m de ancho, 40m de largo y 7m de altura. Montaje de estructuras metálicas. Colocación y montaje de Cierre en Cubiertas y Fachadas de Panel Sándwich 40mm.',
                'description_en' => 'Total Price/m² = €113.52/m². Ship with plaibanda 25m wide, 40m long and 7m high. Assembly of metal structures. Placement and assembly of Closure in Roofs and Facades of 40mm Sandwich Panel.',
                'description_pt' => 'Preço Total/m² = € 113,52/m². Navio com plaibanda de 25m de largura, 40m de comprimento e 7m de altura. Montagem de estruturas metálicas. Colocação e montagem de Fechamento em Coberturas e Fachadas de Painel Sandwich 40mm.',
                'title_es' => 'Porto, Zona Urbana Industrial',
                'title_en' => 'Porto, Urban Industrial Zone',
                'title_pt' => 'Porto, Zona Industrial Urbana',
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
                'description_es' => 'Precio Total/m² = 127,03 €/m². Nave sin platibanda de 20m de ancho, 60m de largo y 5m de altura. Ejecución y fundición de Zapatas y Piso. Montaje de estructuras metálicas. Colocación y montaje de Cierre en Cubiertas y Fachadas de Panel Sándwich 50mm.',
                'description_en' => 'Total Price/m² = €127.03/m². Ship without platform 20m wide, 60m long and 5m high. Execution and foundry of Footings and Floor. Assembly of metal structures. Placement and assembly of Closure in Roofs and Facades of 50mm Sandwich Panel.',
                'description_pt' => 'Preço Total/m² = € 127,03/m². Navio sem plataforma com 20m de largura, 60m de comprimento e 5m de altura. Execução e fundição de Sapatas e Piso. Montagem de estruturas metálicas. Colocação e montagem de Fechamento em Coberturas e Fachadas de Painel Sandwich 50mm.',
                'title_en' => 'Leiria, Rural zone',
                'title_es' => 'Leiria, Zona Rural',
                'title_pt' => 'Leiria, Zona Rural',
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
                'description_es' => 'Precio Total/m² = 90,58 €/m². Nave sin platibanda de 40m de ancho, 60m de largo y 8m de altura. Ejecución y fundición de Zapatas y Piso. Montaje de estructuras metálicas.',
                'description_en' => 'Total Price/m² = €90.58/m². Ship without platform 40m wide, 60m long and 8m high. Execution and foundry of Footings and Floor. Assembly of metal structures.',
                'description_pt' => 'Preço Total/m² = 90,58€/m². Navio sem plataforma com 40m de largura, 60m de comprimento e 8m de altura. Execução e fundição de Sapatas e Piso. Montagem de estruturas metálicas.',
                'title_es' => 'Lisboa, Zona Industrial',
                'title_en' => 'Lisboa, Industrial zone',
                'title_pt' => 'Lisboa, Zona Industrial',
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
                'description_en' => 'Total Price/m² = €42.83/m². Ship without platform 30m wide, 80m long and 5m high. Supply of Closure in Roofs and Facades of 50mm Sandwich Panel.',
                'description_es' => 'Precio Total/m² = 42,83 €/m². Nave sin platibanda de 30m de ancho, 80m de largo y 5m de altura. Suministro de Cierre en Cubiertas y Fachadas de Panel Sándwich 50mm.',
                'description_pt' => 'Preço Total/m² = 42,83€/m². Navio sem plataforma com 30m de largura, 80m de comprimento e 5m de altura. Fornecimento de Fechamento em Coberturas e Fachadas de Painel Sandwich 50mm.',
                'title_en' => 'Guarda, Rural zone',
                'title_es' => 'Guarda, Zona Rural',
                'title_pt' => 'Guarda, Zona Rural',
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
                'title_pt' => $item['title_pt'],
                'title_es' => $item['title_es'],
                'title_en' => $item['title_en'],
                'description_es' => $item['description_es'],
                'description_en' => $item['description_en'],
                'description_pt' => $item['description_pt'],
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

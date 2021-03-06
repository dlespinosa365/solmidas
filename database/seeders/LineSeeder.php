<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lines')->insert([
            'number' => '1.1',
            'order' => 1,
            'description_es' => 'Excavación y movimiento de tierra para zapatas en obra sin transportación del material excavado.',
            'description_en' => 'Excavation and earth movement for shoes on construction without transportation of the excavated material.',
            'description_pt' => 'Escavação e movimento de terras sem transporte do material escavado a vazadouro',
            'unit' => 'm³',
            'unitPrice' => 3.5,
            'calculateFunction' => 'OneOne',
            'constans' => '{"multiplicador1":1.2}',
            'line_category_id' => 1,
            'identifier_es' => 'Excavación',
            'identifier_en' => 'Excavación',
            'identifier_pt' => 'Excavación'
        ]);
        DB::table('lines')->insert([
            'number' => '1.2',
            'order' => 2,
            'description_es' => 'Ejecución de fundición de hormión armado, constituido para zapatas, vigas zapatas y pedestales y todos los materiales y trabajos necesarios por ejemplo: encofrados, nivelación, armaduras, hormigonado y vibración, hormigón de limpieza, etc.',
            'description_en' => 'Execution of reinforced hint, constituted for shoes, beams and pedestals and all the necessary materials and works, for example: formwork, leveling, armor, concreting and vibration, cleaning concrete, etc.',
            'description_pt' => 'Execução de fundações em betão armado em sapatas, vigas e plintos, incluindo todos os trabalhos necessários, como: cofragem, armaduras, betonagem e betão de limpeza.',
            'unit' => 'm³',
            'unitPrice' => 200,
            'calculateFunction' => 'OneTwo',
            'constans' => '{"multiplicador1":0.07, "multiplicador2":1.1}',
            'line_category_id' => 1,
            'identifier_es' => 'Fundición de hormión',
            'identifier_en' => 'Fundición de hormión',
            'identifier_pt' => 'Fundición de hormión'
        ]);
        DB::table('lines')->insert([
            'number' => '1.3',
            'order' => 3,
            'description_es' => 'Ejecución de fundión de hormión armado, constituido para pisos a nivel de suelo espesor de 12≈15cm y todos los materiales y trabajos necesarios, ejemplo: encofrados, nivelación y compactación del suelo, armaduras, hormigonado y vibración, etc.',
            'description_en' => 'Armed fern foundion execution, constituted for ground floor level thickness of 12≈15cm and all necessary materials and work, example: Formwork, leveling and compaction of the soil, armor, concreting and vibration, etc.',
            'description_pt' => 'Execução de piso térreo em betão armado, espessura de 12 a 15cm, incluindo todos os materiais e trabalhos necessários, como: cofragem, nivelação e compactação do solo, armaduras e betonagem.',
            'unit' => 'm²',
            'unitPrice' => 24.5,
            'calculateFunction' => 'OneThree',
            'constans' => '{}',
            'line_category_id' => 1,
            'identifier_es' => 'Fundición de hormión',
            'identifier_en' => 'Fundición de hormión',
            'identifier_pt' => 'Fundición de hormión'
        ]);
        DB::table('lines')->insert([
            'number' => '2.1',
            'order' => 4,
            'description_es' => 'Colocacón y nivelación de Pernos de Anclaje, y todos los materiales necesarios para su correcta colocación por ejemplo: pernos zincados y planchas de nivelación correspondiente a cada caso.',
            'description_en' => 'Placement and leveling of anchor bolts, and all the materials needed for its correct placement, for example: zincated bolts and leveling plates corresponding to each case.',
            'description_pt' => 'Fornecimento e colocação de chumbadouros e/ou buchas quimicas, incluindo nivelamento.',
            'unit' => 'u',
            'unitPrice' => 50,
            'calculateFunction' => 'TwoOne',
            'constans' => '{}',
            'line_category_id' => 2,
            'identifier_es' => 'Pernos de Anclaje',
            'identifier_en' => 'Pernos de Anclaje',
            'identifier_pt' => 'Pernos de Anclaje',
        ]);
        DB::table('lines')->insert([
            'number' => '2.2',
            'order' => 5,
            'description_es' => 'Fabricación y montajes de estructuras metálicas principales, constituida por columnas, vigas, arriostres, todos los materiales y trabajos necesarios para la correcta instalación, ejemplo tornillos, recubrimiento anticorrosivo pintado y color de acabado, etc.',
            'description_en' => 'Manufacture and assemblies of main metal structures, consisting of columns, beams, arriper, all materials and work necessary for the correct installation, example screws, painted anti-corrosive coating and finishing color, etc.',
            'description_pt' => 'Fabrico e montagem de estrutura principal, constituida por pilares, vigas e travamentos, incluindo todos os materiais e trabalhos necessários para uma correta instalação, com acabamento anticorrosivo decapado, mais primário e acabamento.',
            'unit' => 'kg',
            'unitPrice' => 1.75,
            'calculateFunction' => 'TwoTwo',
            'constans' => '{"multiplicador1":1.2}',
            'line_category_id' => 2,
            'identifier_es' => 'F/M Estructuras metálicas principales',
            'identifier_en' => 'F/M Estructuras metálicas principales',
            'identifier_pt' => 'F/M Estructuras metálicas principales',
            'isUsedInForMainStructureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '2.3',
            'order' => 6,
            'description_es' => 'Fabricación de estructuras metálicas principales sin montaje, constituida por columnas, vigas, arriostres, todos los materiales y trabajos necesarios para la correcta instalación, ejemplo tornillos, recubrimiento anticorrosivo pintado y color de acabado, etc.',
            'description_en' => 'Manufacture of main metal structures without assembly, consisting of columns, beams, arriper, all materials and work necessary for the correct installation, example screws, painted anti-corrosive coating and finishing color, etc.',
            'description_pt' => 'Fabrico de estrutura principal, constituida por pilares, vigas e travamentos, incluindo todos os materiais e trabalhos necessários para uma correta instalação, com acabamento anticorrosivo decapado, mais primário e acabamento.',
            'unit' => 'kg',
            'unitPrice' => 1.5,
            'calculateFunction' => 'TwoThree',
            'constans' => '{"multiplicador1":1.2}',
            'line_category_id' => 2,
            'identifier_es' => 'F. de estructuras metálicas principales',
            'identifier_en' => 'F. de estructuras metálicas principales',
            'identifier_pt' => 'F. de estructuras metálicas principales',
            'isUsedInForMainStructureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '2.4',
            'order' => 7,
            'description_es' => 'Fabricación y montaje de estructuras metálicas principales, constituida por columnas, vigas, arriostres, todos los materiales y trabajos necesarios para la correcta instalación, ejemplo tornillos, recubrimiento galvanizado etc.',
            'description_en' => 'Manufacture and assembly of main metal structures, consisting of columns, beams, arriper, all materials and work necessary for the correct installation, example screws, galvanized coating etc.',
            'description_pt' => 'Fabrico e montagem de estrutura principal, constituida por pilares, vigas e travamentos, incluindo todos os materiais e trabalhos necessários para uma correta instalação, com acabamento anticorrosivo Galvanizado',
            'unit' => 'kg',
            'unitPrice' => 1.9,
            'calculateFunction' => 'TwoFour',
            'constans' => '{"multiplicador1":1.2}',
            'line_category_id' => 2,
            'identifier_es' => 'F/M de estructuras metálicas principales',
            'identifier_en' => 'F/M de estructuras metálicas principales',
            'identifier_pt' => 'F/M de estructuras metálicas principales',
            'isUsedInForMainStructureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '2.5',
            'order' => 8,
            'description_es' => 'Fabricación de estructuras metálicas principales sin montaje, constituida por columnas, vigas, arriostres, todos los materiales y trabajos necesarios para la correcta instalación, ejemplo tornillos, recubrimiento galvanizado, etc.',
            'description_en' => 'Manufacture of main metallic structures without assembly, consisting of columns, beams, arriper, all materials and work necessary for the correct installation, example screws, galvanized coating, etc.',
            'description_pt' => 'Fabrico de estrutura principal, constituida por pilares, vigas e travamentos, incluindo todos os materiais e trabalhos necessários para uma correta instalação, com acabamento anticorrosivo Galvanizado',
            'unit' => 'kg',
            'unitPrice' => 1.65,
            'calculateFunction' => 'TwoFive',
            'constans' => '{"multiplicador1":1.2}',
            'line_category_id' => 2,
            'identifier_es' => 'F. de estructuras metálicas principales',
            'identifier_en' => 'F. de estructuras metálicas principales',
            'identifier_pt' => 'F. de estructuras metálicas principales',
            'isUsedInForMainStructureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '3.1',
            'order' => 9,
            'description_es' => 'Ejecución y aplicación de estructuras metálicas secundarias, constituida por purlins de fachadas y cubiertas, fijaciones, tirantes de cubierta y fachadas.',
            'description_en' => 'Execution and application of secondary metal structures, consisting of Facades and covers, fixings, cover braces and facades.',
            'description_pt' => 'Fornecimento e montagem de estruturas metálicas secundárias, constituidas por madres de fachada e cobertura, incluindo tirantes e fixações.',
            'unit' => 'kg',
            'unitPrice' => 1.9,
            'calculateFunction' => 'ThreeOne',
            'constans' => '{"multiplicador1":0.25}',
            'line_category_id' => 3,
            'identifier_es' => 'E/A de estructuras metálicas secundarias',
            'identifier_en' => 'E/A de estructuras metálicas secundarias',
            'identifier_pt' => 'E/A de estructuras metálicas secundarias',
            'isUsedInSecondaryStructureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '3.2',
            'order' => 10,
            'description_es' => 'Canales pluviales simples.',
            'description_en' => 'Simple rainfall channels.',
            'description_pt' => 'Caleiras em chapa galvanizada',
            'unit' => 'ml',
            'unitPrice' => 28,
            'calculateFunction' => 'ThreeTwo',
            'constans' => '{"multiplicador1":2}',
            'line_category_id' => 3,
            'identifier_es' => 'Canales pluviales simples.',
            'identifier_en' => 'Canales pluviales simples.',
            'identifier_pt' => 'Canales pluviales simples.'
        ]);
        DB::table('lines')->insert([
            'number' => '3.3',
            'order' => 11,
            'description_es' => 'Canales pluviales con aislamiento.',
            'description_en' => 'Storming channels with isolation.',
            'description_pt' => 'Caleiras em chapa galvanizada, forradas com chapa lacada e interposição de lã de rocha.',
            'unit' => 'ml',
            'unitPrice' => 40,
            'calculateFunction' => 'ThreeThree',
            'constans' => '{"multiplicador1":2}',
            'line_category_id' => 3,
            'identifier_es' => 'Canales pluviales con aislamiento.',
            'identifier_en' => 'Canales pluviales con aislamiento.',
            'identifier_pt' => 'Canales pluviales con aislamiento.'
        ]);
        DB::table('lines')->insert([
            'number' => '3.4',
            'order' => 12,
            'description_es' => 'Tubo de queda PVC Ø140',
            'description_en' => 'PVC sleeve tube Ø140',
            'description_pt' => 'Tubos de queda em PVC Ø140',
            'unit' => 'ml',
            'unitPrice' => 14,
            'calculateFunction' => 'ThreeFour',
            'constans' => '{}',
            'line_category_id' => 3,
            'identifier_es' => 'Tubo de queda PVC Ø140',
            'identifier_en' => 'Tubo de queda PVC Ø140',
            'identifier_pt' => 'Tubo de queda PVC Ø140',
        ]);
        DB::table('lines')->insert([
            'number' => '4.1',
            'order' => 13,
            'description_es' => 'Montaje e instalación de paneles sandwich en Cubierta, incluyendo todos los materiales para su correcta instalación como tornillos y remates. Panel de 50mm poliuretano.',
            'description_en' => 'Assembly and installation of sandwich panels on deck, including all materials for its correct installation such as screws and auction. 50mm polyurethane panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em cobertura, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 50mm PUR',
            'unit' => 'm²',
            'unitPrice' => 28.13,
            'calculateFunction' => 'FourOne',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles sandwich en Cubierta',
            'identifier_en' => 'M/I de paneles sandwich en Cubierta',
            'identifier_pt' => 'M/I de paneles sandwich en Cubierta',
            'isUsedInMetalClosureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '4.2',
            'order' => 14,
            'description_es' => 'Montaje e instalación de paneles sandwich en Cubierta, incluyendo todos los materiales para su correcta instalación como tornillos y remates. Panel de 40mm poliuretano.',
            'description_en' => 'Assembly and installation of sandwich panels on deck, including all materials for its correct installation such as screws and auction. 40mm polyurethane panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em cobertura, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 40mm PUR',
            'unit' => 'm²',
            'unitPrice' => 26.88,
            'calculateFunction' => 'FourTwo',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles sandwich en Cubierta',
            'identifier_en' => 'M/I de paneles sandwich en Cubierta',
            'identifier_pt' => 'M/I de paneles sandwich en Cubierta',
            'isUsedInMetalClosureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '4.3',
            'order' => 15,
            'description_es' => 'Montaje e instalación de paneles sandwich en Cubierta, incluyendo todos los materiales para su correcta instalación como tornillos y remates. Panel de 30mm poliuretano.',
            'description_en' => 'Assembly and installation of sandwich panels on deck, including all materials for its correct installation such as screws and auction. 30mm polyurethane panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em cobertura, incluindo todos os materiais para a sua correta instalação como parafusos e remates.Painel de 30mm PUR',
            'unit' => 'm²',
            'unitPrice' => 25.63,
            'calculateFunction' => 'FourThree',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles sandwich en Cubierta',
            'identifier_en' => 'M/I de paneles sandwich en Cubierta',
            'identifier_pt' => 'M/I de paneles sandwich en Cubierta',
            'isUsedInMetalClosureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '4.4',
            'order' => 16,
            'description_es' => 'Montaje e instalación de paneles sandwich en fachadas, incluyendo todos los materiales para su correcta instalación como tornillos y remates. Panel de 50mm poliuretano.',
            'description_en' => 'Assembly and installation of sandwich panels in facades, including all materials for its correct installation such as screws and auction. 50mm polyurethane panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em fachada, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 50mm PUR',
            'unit' => 'm²',
            'unitPrice' => 29.5,
            'calculateFunction' => 'FourFour',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles sandwich en fachada',
            'identifier_en' => 'M/I de paneles sandwich en fachada',
            'identifier_pt' => 'M/I de paneles sandwich en fachada',
            'isUsedInFacadeClosureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '4.5',
            'order' => 17,
            'description_es' => 'Montaje e instalación de paneles sandwich en fachadas, incluyendo todos los materiales para su correcta instalación como tornillos y remates. Panel de 40mm poliuretano.',
            'description_en' => 'Assembly and installation of sandwich panels in facades, including all materials for its correct installation such as screws and auction. 40mm polyurethane panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em fachada, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 40mm PUR','unit' => 'm²',
            'unitPrice' => 28.12,
            'calculateFunction' => 'FourFive',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles sandwich en fachada',
            'identifier_en' => 'M/I de paneles sandwich en fachada',
            'identifier_pt' => 'M/I de paneles sandwich en fachada',
            'isUsedInFacadeClosureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '4.6',
            'order' => 18,
            'description_es' => 'Montaje e instalación de paneles sandwich en fachadas, incluyendo todos los materiales para su correcta instalación como tornillos y remates. Panel de 30mm poliuretano.',
            'description_en' => 'Assembly and installation of sandwich panels in facades, including all materials for its correct installation such as screws and auction. 30mm polyurethane panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em fachada, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 30mm PUR','unit' => 'm²',
            'unitPrice' => 26.88,
            'calculateFunction' => 'FourSix',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles sandwich en fachada',
            'identifier_en' => 'M/I de paneles sandwich en fachada',
            'identifier_pt' => 'M/I de paneles sandwich en fachada',
            'isUsedInFacadeClosureCalculate' => true
        ]);
        DB::table('lines')->insert([
            'number' => '4.7',
            'order' => 19,
            'description_es' => 'Montaje e instalación de paneles lana de roca en cubierta, incluyendo todos los materiales para su correcta instalación como tornillos y remates Panel de espesor 50mm.',
            'description_en' => 'Assembly and installation of rock wool panels on the deck, including all materials for its correct installation such as screws and finals thickness panel 50mm.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em cobertura, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 50mm Lã de Rocha','unit' => 'm²',
            'unitPrice' => 34.38,
            'calculateFunction' => 'FourSeven',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles lana de roca en cubierta',
            'identifier_en' => 'M/I de paneles lana de roca en cubierta',
            'identifier_pt' => 'M/I de paneles lana de roca en cubierta'
        ]);
        DB::table('lines')->insert([
            'number' => '4.8',
            'order' => 20,
            'description_es' => 'Montaje e instalación de paneles lana de roca en cubierta, incluyendo todos los materiales para su correcta instalación como tornillos y remates Panel de espesor 40mm.',
            'description_en' => 'Assembly and installation of rock wool panels on deck, including all materials for its correct installation such as screws and auctions Thickness panel 40mm.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em cobertura, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 40mm Lã de Rocha',
            'unit' => 'm²',
            'unitPrice' => 33.13,
            'calculateFunction' => 'FourEight',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles lana de roca en cubierta',
            'identifier_en' => 'M/I de paneles lana de roca en cubierta',
            'identifier_pt' => 'M/I de paneles lana de roca en cubierta',
        ]);
        DB::table('lines')->insert([
            'number' => '4.9',
            'order' => 21,
            'description_es' => 'Montaje e instalación de paneles lana de roca en cubierta, incluyendo todos los materiales para su correcta instalación como tornillos y remates Panel de espesor 30mm.',
            'description_en' => 'Assembly and installation of rock wool panels on deck, including all materials for its correct installation such as screws and finors thick panel 30mm.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em cobertura, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 30mm Lã de Rocha',
            'unit' => 'm²',
            'unitPrice' => 31.88,
            'calculateFunction' => 'FourNine',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles lana de roca en cubierta',
            'identifier_en' => 'M/I de paneles lana de roca en cubierta',
            'identifier_pt' => 'M/I de paneles lana de roca en cubierta',
        ]);
        DB::table('lines')->insert([
            'number' => '4.10',
            'order' => 22,
            'description_es' => 'Montaje e instalación de paneles lana de roca en fachadas, incluyendo todos los materiales para su correcta instalación como tornillos y remates Panel de 50mm.',
            'description_en' => 'Assembly and installation of rock wool panels on façades, including all materials for its correct installation such as 50mm screws and auction panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em fachada, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 50mm lã de Rocha',
            'unit' => 'm²',
            'unitPrice' => 35.63,
            'calculateFunction' => 'FourTen',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles lana de roca en fachadas',
            'identifier_en' => 'M/I de paneles lana de roca en fachadas',
            'identifier_pt' => 'M/I de paneles lana de roca en fachadas',
        ]);
        DB::table('lines')->insert([
            'number' => '4.11',
            'order' => 23,
            'description_es' => 'Montaje e instalación de paneles lana de roca en fachadas, incluyendo todos los materiales para su correcta instalación como tornillos y remates Panel de 40mm.',
            'description_en' => 'Assembly and installation of rock wool panels in facades, including all materials for its correct installation such as 40mm screws and auction panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em fachada, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 40mm lã de Rocha',
            'unit' => 'm²',
            'unitPrice' => 34.38,
            'calculateFunction' => 'FourEleven',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles lana de roca en fachadas',
            'identifier_en' => 'M/I de paneles lana de roca en fachadas',
            'identifier_pt' => 'M/I de paneles lana de roca en fachadas',
        ]);
        DB::table('lines')->insert([
            'number' => '4.12',
            'order' => 24,
            'description_es' => 'Montaje e instalación de paneles lana de roca en fachadas, incluyendo todos los materiales para su correcta instalación como tornillos y remates Panel de 30mm.',
            'description_en' => 'Assembly and installation of rock wool panels on façades, including all materials for its correct installation such as 30mm screws and auction panel.',
            'description_pt' => 'Fornecimento e montagem de painel sanduiche em fachada, incluindo todos os materiais para a sua correta instalação como parafusos e remates. Painel de 30mm lã de Rocha',
            'unit' => 'm²',
            'unitPrice' => 33.13,
            'calculateFunction' => 'FourTwelve',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles lana de roca en fachadas',
            'identifier_en' => 'M/I de paneles lana de roca en fachadas',
            'identifier_pt' => 'M/I de paneles lana de roca en fachadas'
        ]);
        DB::table('lines')->insert([
            'number' => '4.13',
            'order' => 25,
            'description_es' => 'Montaje e instalación de tejas simples en cubiertas, incluyendo todos los materiales para su correcta instalación como tornillos y remates.',
            'description_en' => 'Assembly and installation of simple tiles in covers, including all materials for its correct installation such as screws and auction.',
            'description_pt' => 'Fornecimento e montagem de chapa simples em coberturas, incluindo todos os materiais para a sua correta instalação como parafusos e remates.',
            'unit' => 'm²',
            'unitPrice' => 15,
            'calculateFunction' => 'FourThirteen',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles lana de roca en fachadas',
            'identifier_en' => 'M/I de paneles lana de roca en fachadas',
            'identifier_pt' => 'M/I de paneles lana de roca en fachadas',
        ]);
        DB::table('lines')->insert([
            'number' => '4.14',
            'order' => 26,
            'description_es' => 'Montaje e instalación de tejas simples en fachadas, incluyendo todos los materiales para su correcta instalación como tornillos y remates.',
            'description_en' => 'Assembly and installation of simple tiles in facades, including all materials for its correct installation such as screws and auction.',
            'description_pt' => 'Fornecimento e montagem de chapa simples em fachadas, incluindo todos os materiais para a sua correta instalação como parafusos e remates.',
            'unit' => 'm²',
            'unitPrice' => 16.25,
            'calculateFunction' => 'FourFourten',
            'constans' => '{"multiplicador1":1.02}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles de tejas simples en fachadas',
            'identifier_en' => 'M/I de paneles de tejas simples en fachadas',
            'identifier_pt' => 'M/I de paneles de tejas simples en fachadas',
        ]);
        DB::table('lines')->insert([
            'number' => '4.15',
            'order' => 27,
            'description_es' => 'Montaje e instalación de tejas simples en platibandas, incluyendo todos los materiales para su correcta instalación como tornillos y remates.',
            'description_en' => 'Assembly and installation of simple tiles in PLACIBandas, including all materials for its correct installation such as screws and auction.',
            'description_pt' => 'Fornecimento e montagem de chapa simples em platibandas incluindo todos os materiais para a sua correta instalação como parafusos e remates.',
            'unit' => 'm²',
            'unitPrice' => 16.25,
            'calculateFunction' => 'FourFifteen',
            'constans' => '{"multiplicador1":0.046}',
            'line_category_id' => 4,
            'identifier_es' => 'M/I de paneles de tejas simples en platibandas',
            'identifier_en' => 'M/I de paneles de tejas simples en platibandas',
            'identifier_pt' => 'M/I de paneles de tejas simples en platibandas',
        ]);
        DB::table('lines')->insert([
            'number' => '5.1',
            'order' => 28,
            'description_es' => 'Montaje e instalación de puertas peatonales incluyendo todos los materiales para su correcta instalación como tornillos y remates Puerta de emergencia con barra.',
            'description_en' => 'Assembly and installation of pedestrian doors including all materials for its correct installation such as screws and auction emergency door with bar.',
            'description_pt' => 'Fornecimento e montagem de portas de homem incluindo todos os materias para a sua correta instalação. Porta de emergência com barra antipânico',
            'unit' => 'm²',
            'unitPrice' => 350,
            'calculateFunction' => 'FiveOne',
            'constans' => '{}',
            'line_category_id' => 5,
            'identifier_es' => 'M/I de puertas peatonales',
            'identifier_en' => 'M/I de puertas peatonales',
            'identifier_pt' => 'M/I de puertas peatonales',
        ]);
        DB::table('lines')->insert([
            'number' => '5.2',
            'order' => 29,
            'description_es' => 'Montaje e instalación de puertas peatonales incluyendo todos los materiales para su correcta instalación como tornillos y remates Puerta de servicio.',
            'description_en' => 'Assembly and installation of pedestrian doors including all materials for its correct installation such as screws and shuttle service door.',
            'description_pt' => 'Fornecimento e montagem de portas de homem incluindo todos os materias para a sua correta instalação. Porta de serviço',
            'unit' => 'm²',
            'unitPrice' => 275,
            'calculateFunction' => '',
            'constans' => '{}',
            'line_category_id' => 5,
            'identifier_es' => 'M/I de puertas peatonales',
            'identifier_en' => 'M/I de puertas peatonales',
            'identifier_pt' => 'M/I de puertas peatonales',
        ]);
        DB::table('lines')->insert([
            'number' => '5.3',
            'order' => 30,
            'description_es' => 'Montaje e instalación de puertas seccionadas incluyendo todos los materiales para su correcta instalación como tornillos y remates. Puerta seccionada motorizada de tamaño igual o superior a 16m².',
            'description_en' => 'Assembly and installation of sectioned doors including all materials for its correct installation such as screws and auction. Motorized section of size equal to or greater than 16m².',
            'description_pt' => 'Fornecimento e montagem de portas seccionadas incluindo todos os materiais para a sua correta instalação e utilização. Porta seccionada motorizada com dimensão igual ou superior a 16m²','unit' => 'm²',
            'unitPrice' => 130,
            'calculateFunction' => '',
            'constans' => '{}',
            'line_category_id' => 5,
            'identifier_es' => 'M/I de puertas seccionadas',
            'identifier_en' => 'M/I de puertas seccionadas',
            'identifier_pt' => 'M/I de puertas seccionadas',
        ]);
        DB::table('lines')->insert([
            'number' => '5.4',
            'order' => 31,
            'description_es' => 'Montaje e instalación de puertas seccionadas incluyendo todos los materiales para su correcta instalación como tornillos y remates. Puerta seccionada motorizada de tamaño igual o inferior a 16m².',
            'description_en' => 'Assembly and installation of sectioned doors including all materials for its correct installation such as screws and auction. Motorized section of size equal to or less than 16m².',
            'description_pt' => 'Fornecimento e montagem de portas seccionadas incluindo todos os materiais para a sua correta instalação e utilização. Porta seccionada motorizada com dimensão igual ou inferior a 16m²','unit' => 'm²',
            'unitPrice' => 200,
            'calculateFunction' => '',
            'constans' => '{}',
            'line_category_id' => 5,
            'identifier_es' => 'M/I de puertas seccionadas',
            'identifier_en' => 'M/I de puertas seccionadas',
            'identifier_pt' => 'M/I de puertas seccionadas',
        ]);
    }
}

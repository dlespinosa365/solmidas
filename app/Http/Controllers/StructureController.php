<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Auth;
use App\Helpers\StructureHelper;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $structures = Structure::where('user_id', $user->id)->get();
        return ResponseHelper::sendSuccess($structures, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ResponseHelper::sendSuccess(Structure::getNew(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $structure = StructureHelper::getStructureByRequest($request);
        try {
            $structure->code = StructureHelper::generateCode($structure);
            $structure->user_id = $user->id;
            if ($user->isAdmin) {
                $structure->isPublic = true;
                $this->addFilesToStructure($request, $structure);
            }
            $structure->save();
            $estimateData = StructureHelper::createEstimateDataForStructure($structure);
            $structure->weightFrame = $estimateData['weightFrame'];
            $structure->foundationVolume = $estimateData['foundationVolume'];
            $structure->countFrame = $estimateData['countFrame'];
            $structure->update();
            $structure = StructureHelper::getFullStructure($structure->id);
            return ResponseHelper::sendSuccess($structure, 200);
        }
        catch (\Throwable $th) {
            return ResponseHelper::sendError($th->__toString(), 500);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = Auth::user();
      $structure = StructureHelper::getFullStructure($id, $user->id);
      if ($structure != null) {  
        return ResponseHelper::sendSuccess($structure, 200);
      }
      return ResponseHelper::sendError('Configuracion no encontrada', 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $structure = Structure::where('user_id', $user->id)->where('id', $id)->get()->first();
        if ($structure) {
            $structureData = Structure::getNew();
            return ResponseHelper::sendSuccess([
                'structure' => $structure,
                'structure_fields_data' => $structureData
            ], 200);
        }
        return ResponseHelper::sendError('Configuracion no encontrada', 400);
    }

    /**
     * getLines.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLines(Request $request)
    {
        $structure = StructureHelper::getStructureByRequest($request);
        $linesData = StructureHelper::getLinesDataByStructure($structure);
        $categoriesWithTotal = StructureHelper::groupLinesByCategories($linesData['linesOptions']);
        return ResponseHelper::sendSuccess($categoriesWithTotal, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $structure = Structure::where('user_id', $user->id)->where('id', $id)->get()->first();
        if ($structure) {
            $structure->delete();
            return ResponseHelper::sendSuccess($structure, 200);
        }
        return ResponseHelper::sendError('Configuracion no encontrada', 400);
    }

    

    public function changeCode($id, Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);
        $user = Auth::user();
        $structure = Structure::where('id', $id)->where('user_id', $user->id);
        if ($structure != null) {
            $structure->code = $request->input('code');
            $structure->save();
            return ResponseHelper::sendSuccess($structure, 200);
        }
        return ResponseHelper::sendError('No se pudo actualizar el codigo', 404);
    }

    public function update($id, Request $request) {

    }


    public function getPublicStructures() {
        $structures = Structure::where('isPublic', true)->with('medias')->get();
        $structures = $structures->map->only(['title', 'description', 'medias']);
        return ResponseHelper::sendSuccess($structures, 200);
    }
}

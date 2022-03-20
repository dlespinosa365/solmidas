<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Auth;
use App\Helpers\StructureHelper;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Mail;
use App\Models\Estimate;



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
        if ($user->isAdmin) {
            $structures = Structure::orderBy('created_at', 'desc')->with('user', 'medias')->get();
            return ResponseHelper::sendSuccess($structures, 200);
        }
        $structures = Structure::where('user_id', $user->id)->orderBy('created_at', 'desc')->with('user', 'medias')->get();
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
        $structure->user_id = $user->id;
        try {
            if ($user->isAdmin) {
                $structure->isPublic = true;
                $structure->save();
                StructureHelper::addFilesToStructure($request, $structure);
                return ResponseHelper::sendSuccess(Structure::where('id', $structure->id)->with('medias')->first()->getForAdmin(), 200);
            }
            $structure = StructureHelper::setAllDataInStructure($structure, $user);
            $structure = StructureHelper::getFullStructure($structure->id);
            $this->sendNotificationMail($structure);
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
        if ($user->isAdmin) {
            $structure = StructureHelper::getFullStructure($id);
        } else {
            $structure = StructureHelper::getFullStructure($id, $user->id);
        }
        if ($structure != null) {
            return ResponseHelper::sendSuccess($structure, 200);
        }
        return ResponseHelper::sendError('Configuration not found.', 400);
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
        return ResponseHelper::sendError('Configuration not found.', 400);
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
        return ResponseHelper::sendError('Configuration not found.', 400);
    }


    public function changeCode($id, Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);
        $user = Auth::user();
        $structure = Structure::where('id', $id)->where('user_id', $user->id)->get()->first();
        if ($structure != null) {
            $structure->code = $request->input('code');
            $structure->save();
            return ResponseHelper::sendSuccess($structure, 200);
        }
        return ResponseHelper::sendError('The code can\'t be updated.', 404);
    }

    public function updateAdmin($id, Request $request) {
        $structure = Structure::where('id', $id)->get()->first();
        if ($structure != null) {
            $structureData = StructureHelper::getRequestDataByAdmin($request, true);
            $medias = Media::where('structure_id', $structure->id);
            if ($medias) {
                $medias->delete();
            }
            $structure->fill($structureData);
            StructureHelper::addFilesToStructure($request, $structure);
            $structure->update();
        }
        return ResponseHelper::sendSuccess(Structure::where('id', $structure->id)->get()->first()->getForAdmin(), 200);
    }

    public function updateCommon($id, Request $request) {
        $user = Auth::user();
        $structure = Structure::where('id', $id)->where('user_id', $user->id)->get()->first();
        if ($structure != null) {
            $structureData = StructureHelper::getRequestDataByAdmin($request, false);
            $structure->fill($structureData);
            Estimate::where('structure_id', $structure->id)->delete();
            $structure = StructureHelper::setAllDataInStructure($structure, $user);
            $structure->update();
            $structure = StructureHelper::getFullStructure($structure->id);
        }
        return ResponseHelper::sendSuccess($structure, 200);
    }

    public function update($id, Request $request)
    {
        $user = Auth::user();
        if ($user->isAdmin) {
            StructureHelper::validateStructureForAdmin($request);
        }
        else {
            // StructureHelper::validateStructure($request);
        }
        try {
            if ($user->isAdmin) {
                return $this->updateAdmin($id, $request);
            }
            else {
                return $this->updateCommon($id, $request);
            }
        }
        catch (\Throwable $th) {
            dd($th);
        }
        return ResponseHelper::sendError('Configuration not found.', 400);
    }
    public function getPublicStructures()
    {
        $structures = Structure::where('isPublic', true)->orderBy('created_at', 'desc')->with('medias')->get();
        $structures = $structures->map->only(['title', 'description', 'medias', 'id']);
        return ResponseHelper::sendSuccess($structures, 200);
    }

    public function pdf($id) {
        $user = Auth::user();
        if ($user->isAdmin) {
            $structure = Structure::where('id', $id)->get()->first();
        } else {
            $structure = Structure::where('id', $id)->where('user_id', $user->id)->get()->first();
        }
        if ($structure != null) {
            $structureFull = StructureHelper::getFullStructure($structure->id, $user->id);
            $data = [
                'structure' => $structureFull, 
                'user' => $user
            ];
            $pdf = PDF::loadView('pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download($structure->code.'.pdf');
        }
        return ResponseHelper::sendError('Configuration not found.', 400);
    }

    public function sendNotificationMail(Structure $structure) {
        $user = Auth::user();
        $data = [
            'structure' =>$structure, 
            'user' => $user
        ];
        $pdf = PDF::loadView('pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);
        Mail::send('structure', ['data' => $data], function ($m) use ($pdf, $structure) {
            $m->from('solmidas@solmidas.com', 'Solmidas');
            $m->to('solmidas@solmidas.com', 'Solmidas')->subject('Nueva configuración creada!');
            $m->attachData($pdf->output(), $structure->code.'.pdf');
        });
    }

}

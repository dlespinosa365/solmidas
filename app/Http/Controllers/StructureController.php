<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Models\Line;
use App\Models\LineOption;
use App\Models\LineCategory;
use App\Models\Media;
use App\Helpers\CalculateFunctionsHelper;
use App\Helpers\LogHelper;
use Illuminate\Support\Facades\Auth;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // aqui es donde hay que devolver los elementos para el nuevo formulario
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
        $this->validateRquest($request);
        try {
            $user = Auth::user();
            $structureData = $request->only([
                'withPlatibanda',
                'description',
                'title',
                'distanceBetweenFrames',
                'shipLength',
                'distanceBetweenColumns',
                'altitudeOfTheWork',
                'shoes',
                'floor',
                'metalClosure',
                'coverType',
                'coverDensity',
                'cover_tile_type',
                'facadeType',
                'facadeDensity',
                'facade_tile_type',
                'anticorrosiveTreatment',
                'emergencyDoors',
                'emergencyDoorsCount',
                'emergencyDoorsHeight',
                'emergencyDoorswidth',
                'serviceDoors',
                'serviceDoorsCount',
                'serviceDoorsHeight',
                'serviceDoorswidth',
                'sectionedDoorsLessThan16',
                'sectionedDoorsLessThan16Count',
                'sectionedDoorsLessThan16Height',
                'sectionedDoorsLessThan16width',
                'sectionedDoorsMajorThan16',
                'sectionedDoorsMajorThan16Count',
                'sectionedDoorsMajorThan16Height',
                'sectionedDoorsMajorThan16width',
                'requireMontage',
                'user_id',
                'rigid_frame_id',
                'council_id',
                'land_category_id',
                'coating_type_id'
            ]);
            $structure = Structure::create($structureData);
            $structure->code = $this->generateCode($structure);
            $structure->user_id = $user->id;
            if ($user->isAdmin) {
                $structure->isPublic = true;
                $this->addFilesToStructure($request, $structure);
            }
            $structure->save();
            return ResponseHelper::sendSuccess($structure, 200);
        }
        catch (\Throwable $th) {
            return ResponseHelper::sendError($th->__toString(), 500);
        }
    }

    public function addFilesToStructure(Request $request, Structure $structure): bool
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:jpg,jpeg,png,bmp,tiff,flv,mp4,m3u8,ts,3pg,mov,avi,wmv'
            ]);
     
            if($request->hasfile('files'))
             {
                foreach($request->file('files') as $key => $file)
                {
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();
     
                    $insert[$key]['name'] = $name;
                    $insert[$key]['path'] = $path;
                    $insert[$key]['structure_id'] = $structure->id;
     
                }
                Media::insert($insert);
                return true;
             }
             return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(Structure $structure)
    {
    //
    }

    /**
     * getLines.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLines(Request $request)
    {
        $this->validateRquest($request);

        $structureData = $request->only([
            'withPlatibanda',
            'distanceBetweenFrames',
            'shipLength',
            'distanceBetweenColumns',
            'altitudeOfTheWork',
            'shoes',
            'floor',
            'metalClosure',
            'coverType',
            'coverDensity',
            'cover_tile_type',
            'facadeType',
            'facadeDensity',
            'facade_tile_type',
            'anticorrosiveTreatment',
            'emergencyDoors',
            'emergencyDoorsCount',
            'emergencyDoorsHeight',
            'emergencyDoorswidth',
            'serviceDoors',
            'serviceDoorsCount',
            'serviceDoorsHeight',
            'serviceDoorswidth',
            'sectionedDoorsLessThan16',
            'sectionedDoorsLessThan16Count',
            'sectionedDoorsLessThan16Height',
            'sectionedDoorsLessThan16width',
            'sectionedDoorsMajorThan16',
            'sectionedDoorsMajorThan16Count',
            'sectionedDoorsMajorThan16Height',
            'sectionedDoorsMajorThan16width',
            'requireMontage',
            'user_id',
            'rigid_frame_id',
            'council_id',
            'land_category_id',
            'coating_type_id'
        ]);

        $structure = new Structure($structureData);
        $lines = $this->getLinesByStructure($structure);
        $categoriesWithTotal = $this->groupLinesByCategories($lines);
        return ResponseHelper::sendSuccess($categoriesWithTotal, 200);
    }


    /**
     * getLines.
     *
     * @param  \App\Models\Structure  $stwructure
     * @return array
     */
    public function getLinesByStructure(Structure $structure)
    {
        $lines = Line::all();
        $resultLines = [];
        $structure->weightFrame = CalculateFunctionsHelper::weightFrameByStructure($structure);
        $structure->foundationVolume = CalculateFunctionsHelper::totalFoundationVolume($structure);
        $structure->countFrame = abs($structure->shipLength / $structure->distanceBetweenFrames) + 1;
        foreach ($lines as $line) {
            $lineOption = new LineOption();
            $lineOption->total = $line->getAmount($structure);
            $lineOption->line_id = $line->id;
            $lineOption->line = $line;
            array_push($resultLines, $lineOption);
        }
        return $resultLines;
    }

    /**
     * groupLinesByCategories.
     *
     * @param  array  $lineOptions
     * @return array  $categories
     */
    public function groupLinesByCategories(array $lineOptions)
    {
        $categories = LineCategory::all();
        $linesByCategories = [];

        foreach ($categories as $category) {
            $categoryTotal = 0;
            foreach ($lineOptions as $lineOption) {
                if ($lineOption->line->lineCategory->id == $category->id) {
                    $categoryTotal += $lineOption->total;
                }
            }
            $category->total = $categoryTotal;
            array_push($linesByCategories, $category);
        }
        return $linesByCategories;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structure $structure)
    {
    //
    }

    public function generateCode(Structure $structure)
    {
        $code = '';
        if ($structure->withPlatibanda) {
            $code .= 'CP';
        }
        else {
            $code .= 'SP';
        }
        $code .= strval($structure->distanceBetweenColumns);
        $code .= strval($structure->shipLength);
        $code .= strval($structure->altitudeOfTheWork);
        $code .= sprintf("%'.03d\n", $structure->id);
        $code .= date('y');
        return $code;
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

    public function validateRquest(Request $request)
    {
        $request->validate([
            'withPlatibanda' => 'required|boolean',
            'distanceBetweenFrames' => 'required|integer|min:5|max:8',
            'distanceBetweenColumns' => 'required|integer|min:10|max:40',
            'shipLength' => 'required|integer|min:10|max:120',
            'altitudeOfTheWork' => 'required|integer|min:5|max:8',
            'floor' => 'required|boolean',
            'shoes' => 'required|boolean',
            'metalClosure' => 'required',
            'anticorrosiveTreatment' => 'required',
            'facadeDensity' => 'required|integer|min:30|max:50',
            'coverDensity' => 'required|integer|min:30|max:50',
            'emergencyDoors' => 'boolean',
            'emergencyDoorsCount' => 'integer|min:0',
            'emergencyDoorsHeight' => 'numeric|min:0',
            'emergencyDoorswidth' => 'numeric|min:0',
            'serviceDoors' => 'boolean',
            'serviceDoorsCount' => 'integer|min:0',
            'serviceDoorsHeight' => 'numeric|min:0',
            'serviceDoorswidth' => 'numeric|min:0',
            'sectionedDoorsLessThan16' => 'required|boolean',
            'sectionedDoorsLessThan16Count' => 'integer|min:0',
            'sectionedDoorsLessThan16Height' => 'numeric|min:0',
            'sectionedDoorsLessThan16width' => 'numeric|min:0',
            'sectionedDoorsMajorThan16' => 'required|boolean',
            'sectionedDoorsMajorThan16Count' => 'integer|min:0',
            'sectionedDoorsMajorThan16Height' => 'numeric|min:0',
            'sectionedDoorsMajorThan16width' => 'numeric|min:0',
            'requireMontage' => 'required|boolean',
        ]);
    }

    public function getPublicStructures() {
        $structures = Structure::where('isPublic', true)->with('medias')->get();
        $structures = $structures->map->only(['title', 'description', 'medias']);
        return ResponseHelper::sendSuccess($structures, 200);
    }
}

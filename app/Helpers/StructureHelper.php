<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\LineCategory;
use App\Models\Structure;
use App\Models\Line;
use App\Models\LineOption;
use App\Models\Estimate;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class StructureHelper
{
    static function validateStructureForAdmin(Request $request) : void {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    }

    static function validateStructure(Request $request) : void {
        $request->validate([
            'withPlatibanda' => 'required|boolean',
            'distanceBetweenFrames' => 'required|integer|min:5|max:8',
            'distanceBetweenColumns' => 'required|integer|min:10|max:40',
            'shipLength' => 'required|integer|min:10|max:120',
            'columnHeight' => 'required|integer|min:5|max:8',
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

    static function getRequestDataByAdmin(Request $request, bool $isAdmin = false) {
        if ($isAdmin) {
            $structureData = $request->only([
                'title',
                'description'
            ]);
        } else {
            $structureData = $request->only([
                'withPlatibanda',
                'distanceBetweenFrames',
                'shipLength',
                'distanceBetweenColumns',
                'columnHeight',
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
                'rigid_frame_id',
                'council_id',
                'land_category_id',
                'coating_type_id'
            ]);
        }
        return $structureData;

    }

    static function getStructureByRequest(Request $request) {
        $user = Auth::user();
        if ($user != null && $user->isAdmin) {
            StructureHelper::validateStructureForAdmin($request);
            $structureData = StructureHelper::getRequestDataByAdmin($request, true);
        } else {
            StructureHelper::validateStructure($request);
            $structureData = StructureHelper::getRequestDataByAdmin($request, false);
        }
        $structure = new Structure($structureData);
        return $structure;
    }

    static function groupLinesByCategories(array $lineOptions) : array {
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
    static function getLinesDataByStructure(Structure $structure)
    {
        $lines = Line::all();
        $resultLines = [];
        $structure->weightFrame = CalculateFunctionsHelper::weightFrameByStructure($structure);
        $structure->foundationVolume = CalculateFunctionsHelper::totalFoundationVolume($structure);
        $structure->countFrame = abs($structure->shipLength / $structure->distanceBetweenFrames) + 1;
        $totalAmount = 0;
        foreach ($lines as $line) {
            $subtotal = $line->getAmount($structure);
            $lineOption = new LineOption();
            $lineOption->total = $subtotal * $line->unitPrice;
            $lineOption->subtotal = $subtotal;
            $lineOption->line_id = $line->id;
            $lineOption->line = $line;
            array_push($resultLines, $lineOption);
            $totalAmount = $totalAmount + $lineOption->total;
        }
        return [
            'linesOptions' => $resultLines,
            'weightFrame' => $structure->weightFrame,
            'foundationVolume' => $structure->foundationVolume,
            'countFrame' => $structure->countFrame,
            'totalAmount' => $totalAmount,
            'hoursOfWork' => StructureHelper::calculateTotalHours($resultLines, $structure)
        ];
    }

    static function calculateTotalHours($linesOption, Structure $structure) : int {
        $totalWeigthMainStructure = 0;
        $totalWieghtSecondStructure = 0;
        $totalForCoverArea = 0;
        $totalForFacadeClousure = 0;

        foreach ($linesOption as $lineOption) {
            if ($lineOption->line->isUsedInForMainStructureCalculate) {
                $totalWeigthMainStructure += $lineOption->subtotal;
            }
            if ($lineOption->line->isUsedInSecondaryStructureCalculate) {
                $totalWieghtSecondStructure += $lineOption->subtotal;
            }
            if ($lineOption->line->isUsedInMetalClosureCalculate) {
                $totalForCoverArea += $lineOption->subtotal;
            }
            if ($lineOption->line->isUsedInFacadeClosureCalculate) {
                $totalForFacadeClousure += $lineOption->subtotal;
            }
        }

        if ($structure->requireMontage && !$structure->metalClosure) {
            return ceil($totalWeigthMainStructure / 10000);
        }
        return ceil($totalWeigthMainStructure / 10000) + 
               ceil($totalWieghtSecondStructure / 1500)  +
               ceil($totalForCoverArea / 200) + 
               ceil($totalForFacadeClousure / 150);
    }

    static function createEstimateDataForStructure(Structure $structure) {
        $linesData = StructureHelper::getLinesDataByStructure($structure);
        $estimate = Estimate::create();
        $estimate->total = $linesData['totalAmount'];
        foreach ($linesData['linesOptions'] as $lineOption) {
            $lineOption->estimate_id = $estimate->id;
            $lineOption->save();
        }
        $estimate->structure_id = $structure->id;
        $estimate->update();
        return [
            'estimate' => $estimate,
            'weightFrame' => $linesData['weightFrame'],
            'foundationVolume' => $linesData['foundationVolume'],
            'countFrame' => $linesData['countFrame'],
            'hoursOfWork' => $linesData['hoursOfWork']
        ];
    }

    static function addFilesToStructure(Request $request, Structure $structure): bool
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:jpg,jpeg,png,bmp,tiff,flv,mp4,m3u8,ts,3pg,mov,avi,wmv'
            ]);
     
            if($request->hasfile('files'))
             {
                foreach($request->file('files') as $key => $file)
                {
                    $path = $file->store('public/medias');
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

    static function getFullStructure(int $structureId, $userId = null) {
        if ($userId != null) {
            return Structure::where('id', $structureId)
            ->where('user_id', $userId)
            ->with('estimate.linesOptions.line.lineCategory')
            ->get()
            ->first();
        }
        return Structure::where('id', $structureId)
        ->with('estimate.linesOptions.line.lineCategory')
        ->get()
        ->first();
    }

    static function generateCode(Structure $structure)
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
        $code .= strval($structure->columnHeight);
        $code .= sprintf("%'.03d\n", $structure->id);
        $code .= date('y');
        return preg_replace( '/[\W]/', '', $code);
    }

    static function removeEstimateAndLinesOptionsFromStructure(Structure $structure) {
         return $structure->estimate->delete();   
    }

    static function setAllDataInStructure(Structure $structure, $user) {
        $structure->user_id = $user->id;
        $structure->save();
        $structure->code = StructureHelper::generateCode($structure);
        $estimateData = StructureHelper::createEstimateDataForStructure($structure);
        $structure->weightFrame = $estimateData['weightFrame'];
        $structure->foundationVolume = $estimateData['foundationVolume'];
        $structure->countFrame = $estimateData['countFrame'];
        $structure->hoursOfWork = $estimateData['hoursOfWork'];
        $structure->update();
        return $structure;
    }

}

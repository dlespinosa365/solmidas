<?php

namespace App\Helpers;

use App\Models\Structure;
use App\Models\WeightFrame;
use App\Models\FoundationVolume;
use App\Helpers\LogHelper;
use App\Models\Line;
use Illuminate\Support\Facades\DB;


class CalculateFunctionsHelper
{
    public static function weightFrameByStructure(Structure $structure){
        $council = $structure->council;
        $row = WeightFrame::
            where('distenceBetweenColumns', '=', $structure->distanceBetweenColumns)->
            where('distenceBetweenFrames', '=', $structure->distanceBetweenFrames)->
            where('columnsHight', '=', $structure->altitudeOfTheWork)->
            where('withPlatibanda', '=', $structure->withPlatibanda)->
            where('zone', '=', $council->zone)->
            where('hight', '=', $council->hight)->
            where('case', '=', $council->case)->first();
            LogHelper::debug(
                'Peso del portico para la structura ',
                $structure,
                'Resultado',
                $row
            );
        if ($row != null) {
            return $row->total;
        }    
        return 0;
    }

    public static function totalFoundationVolume(Structure $structure) {
        $row = FoundationVolume::
            where('distenceBetweenColumns', '=', $structure->distanceBetweenColumns)->
            where('distenceBetweenFrames', '=', $structure->distanceBetweenFrames)->
            where('columnsHight', '=', $structure->altitudeOfTheWork)->first();
            LogHelper::debug(
                'volumen de zapata',
                $structure,
                'Resultado',
                $row
            );
        if ($row) {
            return $row->total;
        }    
        return 0;
    }

    public static function getConstantFromLines(Line $line) {
        try {
            $response = json_decode($line->constans);
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('JSON invalido en linea', $line, $th);
        }
        return [];
        
    }


    //////all functions
    public static function OneOne(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->floor) {
                $response = $structure->foundationVolume * $structure->countFrame * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en OneOne fn', $line, $th);
        }
        return 0;
    }


    public static function OneTwo(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->floor) {
                $unitVolume = $structure->foundationVolume + 2 * $structure->shipLength 
                + 2 * $structure->distanceBetweenColumns;
                $response = $unitVolume * 
                $constant->multiplicador1 * 
                $constant->multiplicador2 * 
                (($structure->shipLength/$structure->distanceBetweenFrames) + 1);
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en OneTwo fn', $line, $th);
        }
        return 0;
    }

    public static function OneThree(Structure $structure, Line $line) {
        try {
            $response = 0;
            if ($structure->floor) {
                $response = $structure->distanceBetweenColumns * $structure->shipLength;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en OneThree fn', $line, $th);
        }
        return 0;
    }

    public static function TwoOne(Structure $structure, Line $line) {
        try {
            $response = 2 * (($structure->shipLength / $structure->distanceBetweenFrames) + 1);
            
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en TwoOne fn', $line, $th);
        }
        return 0;
    }

    public static function TwoTwo(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->requireMontage) {
                $response = $structure->weightFrame * 
                $constant->multiplicador1 *  
                (($structure->shipLength / $structure->distanceBetweenFrames) + 1);
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en TwoTwo fn', $line, $th);
        }
        return 0;
    }

    public static function TwoThree(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if (!$structure->requireMontage) {
                $response = $structure->weightFrame * 
                $constant->multiplicador1 *  
                (($structure->shipLength / $structure->distanceBetweenFrames) + 1);
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en TwoThree fn', $line, $th);
        }
        return 0;
    }

    public static function TwoFour(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->anticorrosiveTreatment) {
                $response = $structure->weightFrame * 
                $constant->multiplicador1 *  
                (($structure->shipLength / $structure->distanceBetweenFrames) + 1);
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en TwoFour fn', $line, $th);
        }
        return 0;
    }


    public static function TwoFive(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if (!$structure->anticorrosiveTreatment) {
                $response = $structure->weightFrame * 
                $constant->multiplicador1 *  
                (($structure->shipLength / $structure->distanceBetweenFrames) + 1);
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en TwoFive fn', $line, $th);
        }
        return 0;
    }

    public static function ThreeOne(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->metalClosure) {
                $response = $structure->weightFrame * 
                $constant->multiplicador1 *  
                (($structure->shipLength / $structure->distanceBetweenFrames) + 1);
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en ThreeOne fn', $line, $th);
        }
        return 0;
    }


    public static function ThreeTwo(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverTejasSimpleType()) {
                $response = $structure->shipLength * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en ThreeTwo fn', $line, $th);
        }
        return 0;
    }

    public static function ThreeThree(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverLanaDeRocaPanelType() || $structure->isCoverSandwichPanelType()) {
                $response = $structure->shipLength * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en ThreeThree fn', $line, $th);
        }
        return 0;
    }

    public static function ThreeFour(Structure $structure, Line $line) {
        try {
            $response = 0;
            if ($structure->metalClosure) {
                $response = (($structure->shipLength * $structure->distanceBetweenColumns) + 1) * 2;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en ThreeFour fn', $line, $th);
        }
        return 0;
    }

    public static function FourOne(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverSandwichPanelType() && $structure->coverDensity == 50) {
                $response = $structure->distanceBetweenColumns * $structure->shipLength * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourOne fn', $line, $th);
        }
        return 0;
    }

    public static function FourTwo(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverSandwichPanelType() && $structure->coverDensity == 40) {
                $response = $structure->distanceBetweenColumns * $structure->shipLength * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourTwo fn', $line, $th);
        }
        return 0;
    }

    public static function FourThree(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverSandwichPanelType() && $structure->coverDensity == 30) {
                $response = $structure->distanceBetweenColumns * $structure->shipLength * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourThree fn', $line, $th);
        }
        return 0;
    }

    public static function FourFour(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isFacadeSandwichPanelType() && $structure->facadeDensity == 50) {
                $response = ($structure->shipLength * 2  + $constant->distanceBetweenColumns * 2) 
                * $structure->altitudeOfTheWork 
                * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourFour fn', $line, $th);
        }
        return 0;
    }

    public static function FourFive(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isFacadeSandwichPanelType() && $structure->facadeDensity == 40) {
                $response = ($structure->shipLength * 2  + $constant->distanceBetweenColumns * 2) 
                * $structure->altitudeOfTheWork 
                * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourFive fn', $line, $th);
        }
        return 0;
    }

    public static function FourSix(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isFacadeSandwichPanelType() && $structure->facadeDensity == 30) {
                $response = ($structure->shipLength * 2  + $constant->distanceBetweenColumns * 2) 
                * $structure->altitudeOfTheWork 
                * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourSix fn', $line, $th);
        }
        return 0;
    }

    public static function FourSeven(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverLanaDeRocaPanelType() && $structure->coverDensity == 50) {
                $response = $constant->distanceBetweenColumns 
                * $structure->shipLength 
                * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourSeven fn', $line, $th);
        }
        return 0;
    }

    public static function FourEight(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverLanaDeRocaPanelType() && $structure->coverDensity == 40) {
                $response = $constant->distanceBetweenColumns 
                * $structure->shipLength 
                * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourEight fn', $line, $th);
        }
        return 0;
    }


    public static function FourNine(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverLanaDeRocaPanelType() && $structure->coverDensity == 30) {
                $response = $constant->distanceBetweenColumns 
                * $structure->shipLength 
                * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourNine fn', $line, $th);
        }
        return 0;
    }

    public static function FourTen(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isFacadeLanaDeRocaPanelType() && $structure->coverDensity == 50) {
                $response = ($structure->shipLength * 2
                + $structure->distanceBetweenColumns * 2)
                * $structure->altitudeOfTheWork * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourTen fn', $line, $th);
        }
        return 0;
    }

    public static function FourEleven(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isFacadeLanaDeRocaPanelType() && $structure->coverDensity == 40) {
                $response = ($structure->shipLength * 2
                + $structure->distanceBetweenColumns * 2)
                * $structure->altitudeOfTheWork * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourEleven fn', $line, $th);
        }
        return 0;
    }

    public static function FourTwelve(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isFacadeLanaDeRocaPanelType() && $structure->coverDensity == 30) {
                $response = ($structure->shipLength * 2
                + $structure->distanceBetweenColumns * 2)
                * $structure->altitudeOfTheWork * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourTwelve fn', $line, $th);
        }
        return 0;
    }

    public static function FourThirteen(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverTejasSimpleType()) {
                $response = $structure->shipLength
                * $structure->distanceBetweenColumns
                * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourThirteen fn', $line, $th);
        }
        return 0;
    }

    public static function FourFourten(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->isCoverTejasSimpleType()) {
                $response = (2 * $structure->shipLength +
                2 * $structure->distanceBetweenColumns) *
                $structure->altitudeOfTheWork * $constant->multiplicador1;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourFourten fn', $line, $th);
        }
        return 0;
    }

    public static function FourFifteen(Structure $structure, Line $line) {
        $constant = CalculateFunctionsHelper::getConstantFromLines($line);
        try {
            $response = 0;
            if ($structure->withPlatibanda) {
                $response = $structure->distanceBetweenColumns * $constant->multiplicador1 * 
                ($structure->shipLength * 2 + $structure->distanceBetweenColumns * 2);
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FourFifteen fn', $line, $th);
        }
        return 0;
    }

    public static function FiveOne(Structure $structure, Line $line) {
        try {
            $response = 0;
            if ($structure->emergencyDoors) {
                $response = $structure->emergencyDoorsCount * $structure->emergencyDoorsHeight * $structure->emergencyDoorswidth;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FiveOne fn', $line, $th);
        }
        return 0;
    }

    public static function FiveTwo(Structure $structure, Line $line) {
        try {
            $response = 0;
            if ($structure->serviceDoors) {
                $response = $structure->serviceDoorsCount * $structure->serviceDoorsHeight * $structure->serviceDoorswidth;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FiveTwo fn', $line, $th);
        }
        return 0;
    }

    public static function FiveThree(Structure $structure, Line $line) {
        try {
            $response = 0;
            if ($structure->sectionedDoorsMajorThan16) {
                $response = $structure->sectionedDoorsMajorThan16Count * $structure->sectionedDoorsMajorThan16Height * $structure->sectionedDoorsMajorThan16width;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FiveThree fn', $line, $th);
        }
        return 0;
    }

    public static function FiveFour(Structure $structure, Line $line) {
        try {
            $response = 0;
            if ($structure->sectionedDoorsLessThan16) {
                $response = $structure->sectionedDoorsLessThan16Count * $structure->sectionedDoorsLessThan16Height * $structure->sectionedDoorsLessThan16width;
            }
            return $response;
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando el amount en FiveFour fn', $line, $th);
        }
        return 0;
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RigidFrame;
use App\Models\Council;
use App\Models\LandCategory;
use App\Models\CoatingType;
use App\Models\Country;
use App\Models\Estimate;
use App\Models\TileType;
use App\Models\CoverFacadeType;
use App\Models\Media;

class Structure extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'title',
        'isPublic',
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
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'code' => '',
        'description' => '',
        'title' => '',
        'isPublic' => false,
        'withPlatibanda' => false,
        'distanceBetweenFrames' => 0,
        'shipLength' => 0,
        'distanceBetweenColumns' => 0,
        'columnHeight' => 0,
        'shoes' => false,
        'floor' => false,
        'metalClosure' => false,
        'cover_type' => 1,
        'coverDensity' => 30,
        'cover_tile_type' => null,
        'facade_type' => 1,
        'facadeDensity' => 30,
        'facade_tile_type' => null,
        'anticorrosiveTreatment' => false,
        'emergencyDoors' => false,
        'emergencyDoorsCount' => 0,
        'emergencyDoorsHeight' => 0,
        'emergencyDoorswidth' => 0,
        'serviceDoors' => false,
        'serviceDoorsCount' => 0,
        'serviceDoorsHeight' => 0,
        'serviceDoorswidth' => 0,
        'sectionedDoorsLessThan16' => false,
        'sectionedDoorsLessThan16Count' => 0,
        'sectionedDoorsLessThan16Height' => 0,
        'sectionedDoorsLessThan16width' => 0,
        'sectionedDoorsMajorThan16' => false,
        'sectionedDoorsMajorThan16Count' => 0,
        'sectionedDoorsMajorThan16Height' => 0,
        'sectionedDoorsMajorThan16width' => 0,
        'requireMontage' => false,
        'user_id' => null,
        'rigid_frame_id' => null,
        'council_id' => null,
        'land_category_id' => null,
        'coating_type_id' => null
    ];


    public function rigidFrame()
    {
        return $this->belongsTo(RigidFrame::class);
    } 

    public function council()
    {
        return $this->belongsTo(Council::class);
    } 

    public function landCategory()
    {
        return $this->belongsTo(LandCategory::class);
    } 

    public function coatingType()
    {
        return $this->belongsTo(CoatingType::class);
    } 

    public function country()
    {
        return $this->belongsTo(Country::class);
    } 

    public function estimate()
    {
        return $this->hasOne(Estimate::class);
    }
    
    public function facadeTileType()
    {
        return $this->belongsTo(TileType::class, 'facade_tile_type');
    }

    public function coverTileType()
    {
        return $this->belongsTo(TileType::class, 'cover_tile_type');
    }

    public function coverType()
    {
        return $this->belongsTo(CoverFacadeType::class, 'cover_type');
    }

    public function facadeType()
    {
        return $this->belongsTo(CoverFacadeType::class, 'facade_type');
    }

    public function isCoverSandwichPanelType() {
        if ($this->metalClosure) {
            if ($this->coverType != null) {
                return $this->coverType->id == CoverFacadeType::$PANEL_SANWICH;
            }
        }
        return false;
    }

    public function isCoverLanaDeRocaPanelType() {
        if ($this->metalClosure) {
            if ($this->coverType != null) {
                return $this->coverType->id == CoverFacadeType::$PANEL_LLANA_DE_ROCA;
            }
        }
        return false;
    }

    public function isCoverTejasSimpleType() {
        if ($this->metalClosure) {
            if ($this->coverType != null) {
                return $this->coverType->id == CoverFacadeType::$TEJAS_SIMPLES;
            }
        }
        return false;
    }

    public function isFacadeSandwichPanelType() {
        if ($this->metalClosure) {
            if ($this->facadeType != null) {
                return $this->facadeType->id == CoverFacadeType::$PANEL_SANWICH;
            }
        }
        return false;
    }

    public function isFacadeLanaDeRocaPanelType() {
        if ($this->metalClosure) {
            if ($this->facadeType != null) {
                return $this->facadeType->id == CoverFacadeType::$PANEL_LLANA_DE_ROCA;
            }
        }
        return false;
    }

    public function isFacadeTejasSimpleType() {
        if ($this->metalClosure) {
            if ($this->facadeType != null) {
                return $this->facadeType->id == CoverFacadeType::$TEJAS_SIMPLES;
            }
        }
        return false;
    }

    public function medias() {
        return $this->hasMany(Media::class);
    }


    public static function boot() {
        parent::boot();
        self::deleting(function($structure) { // before delete() method call this
             $structure->estimate()->delete();
             $structure->medias()->each(function($media) {
                $media->delete(); // <-- direct deletion
             });
             // do the rest of the cleanup...
        });
    }

    public function getNew() {
        $countries = Country::allInCascade();
        $coatingTypes = CoatingType::all();
        $landCategories = LandCategory::all();
        $rigidFrames = RigidFrame::all();
        $tileTypes = TileType::all();
        $coverFacadeTypes = CoverFacadeType::all();
        return [
            'countriesOptions' => $countries,
            'coatingTypesOptions' => $coatingTypes,
            'landCategoriesOptions' => $landCategories,
            'rigidFramesOptions' => $rigidFrames,
            'tileTypeOptions' => $tileTypes,
            'coverFacadeTypeOptions' => $coverFacadeTypes
        ];
    }

}

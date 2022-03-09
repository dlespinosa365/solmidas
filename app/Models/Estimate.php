<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LineOption;
use App\Models\Structure;

class Estimate extends Model
{
    use HasFactory;

    protected $table = 'estimate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total'
    ];

    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'total' => 0,
        'totalHoursOfWork' => 0,
        'totalHoursForMainStructures' => 0
    ];


    public function linesOptions()
    {
        return $this->hasMany(LineOption::class);
    }


    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }


    public static function boot() {
        parent::boot();
        self::deleting(function($estimate) { // before delete() method call this
             $estimate->linesOptions()->each(function($line) {
                $line->delete(); // <-- direct deletion
             });
             // do the rest of the cleanup...
        });
    }
}

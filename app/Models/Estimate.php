<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LineOption;
use App\Models\Structure;

class Estimate extends Model
{
    use HasFactory;

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
        'total' => 0
    ];


    public function linesOptions()
    {
        return $this->hasMany(LineOption::class);
    }


    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }
}

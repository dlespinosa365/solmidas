<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TileType extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public static $ONDULADA = 1;
    public static $TRAPEZOIDAL = 2;

}

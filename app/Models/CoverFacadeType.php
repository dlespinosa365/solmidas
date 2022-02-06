<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverFacadeType extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    public static $PANEL_SANWICH = 1;
    public static $PANEL_LLANA_DE_ROCA = 2;
    public static $TEJAS_SIMPLES = 3;

}

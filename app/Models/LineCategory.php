<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Line;

class LineCategory extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function linesOptions()
    {
        return $this->hasMany(Line::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estimate;

class LineOption extends Model
{
    use HasFactory;


    public function estimtate()
    {
        return $this->belongsTo(Estimate::class);
    }

    
}

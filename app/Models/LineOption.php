<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estimate;
use App\Models\Line;

class LineOption extends Model
{
    use HasFactory;
    protected $table = 'lines_option';
    protected $hidden = ['created_at', 'updated_at'];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    protected $attributes = [
        'total' => 0,
        'subtotal' => 0,
        'estimate_id' => null,
        'line_id' => null
    ];

    public $line;


    public function estimtate()
    {
        return $this->belongsTo(Estimate::class);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $hidden = ['created_at', 'updated_at'];


    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

}

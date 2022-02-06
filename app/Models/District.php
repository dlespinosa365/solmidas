<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Council;

class District extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];


    public function councils() {
        return $this->hasMany(Council::class);
    }
}

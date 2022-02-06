<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Council;

class Country extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function allInCascade() {
        return [
            'countries' => Country::all(),
            'districts' => District::all(),
            'councils' => Council::all()
        ];
        
    }

    public function districts() {
        return $this->hasMany(District::class);
    }
}

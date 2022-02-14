<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;
use App\Models\LineCategory;
use App\Helpers\LogHelper;
use App\Helpers\CalculateFunctionsHelper;

class Line extends Model
{
    use HasFactory;
    
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       'number',
       'order',
       'description',
       'unit',
       'unitPrice',
       'calculateFunction',
       'constans',
       'identifier'
    ];


    public function getAmount(Structure $structure) {
        $method = $this->calculateFunction;
        try {
            if ($method != '' && $method != null) {
                if (method_exists(CalculateFunctionsHelper::class, $method)) {
                    $response = CalculateFunctionsHelper::$method($structure, $this);
                    return $response;
                } else {
                    LogHelper::debug('El metodo definido para la linea ' . $this->number . ' no existe');
                }
            } else {
                LogHelper::debug('No hay metodo calculateFunction para la linea ' . $this->number);
            }
        } catch (\Throwable $th) {
            LogHelper::debug('Error calculando en la linea  ' . $this->number);
            LogHelper::debug('Error  ' . $th->__toString());
        }
        return 0;
    }

    public function getShortDescription() {
        return $this->number;
    }

    public function lineCategory()
    {
        return $this->belongsTo(LineCategory::class);
    } 

    public function line()
    {
        return $this->hasOne(Line::class);
    }
}

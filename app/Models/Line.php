<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;
use App\Models\LineCategory;
use App\Models\LineOption;
use App\Helpers\LogHelper;
use App\Helpers\CalculateFunctionsHelper;
use App\Helpers\LocaleHelper;
use Illuminate\Support\Facades\App;

class Line extends Model
{
    use HasFactory;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $locales = LocaleHelper::getLocales();
        foreach ($locales as $locale) {
            foreach (static::$translatable_attributes as $attribute) {
                array_push($this->hidden, $attribute . '_' . $locale);
            }
        }
    }


    public static $translatable_attributes = ['description', 'identifier'];


    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'order',
        'unit',
        'unitPrice',
        'calculateFunction',
        'constans',
        'identifier'
    ];

    protected $appends = ['description', 'identifier'];

    public function setDescriptionAttribute($value)
    {
        $currentLocale = App::getLocale();
        $this->attributes['description_' . $currentLocale] = $value;
    }

    public function getDescriptionAttribute()
    {
        $currentLocale = App::getLocale();
        $fallbackLocale = config('app.fallback_locale');
        $value = $this->attributes['description_' . $currentLocale];

        if ($value == null && $value == '') {
            $value = $this->attributes['description_' . $fallbackLocale];
            if ($value == null && $value == '') {
                $value = $this->attributes['description_es'];
            }
        }
        return $value;
    }

    public function setIdentifierAttribute($value)
    {
        $currentLocale = App::getLocale();
        $this->attributes['identifier_' . $currentLocale] = $value;
    }

    public function getIdentifierAttribute()
    {
        $currentLocale = App::getLocale();
        $fallbackLocale = config('app.fallback_locale');
        $value = $this->attributes['identifier_' . $currentLocale];

        if ($value == null && $value == '') {
            $value = $this->attributes['identifier_' . $fallbackLocale];
            if ($value == null && $value == '') {
                $value = $this->attributes['identifier_es'];
            }
        }
        return $value;
    }


    public function getAmount(Structure $structure)
    {
        $method = $this->calculateFunction;
        try {
            if ($method != '' && $method != null) {
                if (method_exists(CalculateFunctionsHelper::class , $method)) {
                    $response = CalculateFunctionsHelper::$method($structure, $this);
                    return $response;
                }
                else {
                    LogHelper::debug('El metodo definido para la linea ' . $this->number . ' no existe');
                }
            }
            else {
                LogHelper::debug('No hay metodo calculateFunction para la linea ' . $this->number);
            }
        }
        catch (\Throwable $th) {
            LogHelper::debug('Error calculando en la linea  ' . $this->number);
            LogHelper::debug('Error  ' . $th->__toString());
        }
        return 0;
    }

    public function getShortDescription()
    {
        return $this->number;
    }

    public function lineCategory()
    {
        return $this->belongsTo(LineCategory::class);
    }

    public function lineOption()
    {
        return $this->hasOne(LineOption::class);
    }

    public function update(array $attributes = Array(), array $options = Array())
    {
        foreach (static::$translatable_attributes as $key => $value) {
            $attributes[$value . '_' . App::getLocale()] = $attributes[$value];
            unset($attributes[$value]);
        }
        return static::query()->update($attributes, $options);
    }

}

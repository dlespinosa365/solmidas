<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Log;


class LogHelper
{
    static function debug(...$arguments) {
        foreach($arguments as $a) {
            if (is_array($a)) {
                 Log::debug(json_encode($a));
            } else
            if (is_object($a)) {
                 Log::debug($a->toJson());
            } else
            if (is_string($a)) {
                 Log::debug(strtoupper($a));
            } else {
                 Log::debug('No se pudo loguar este valor');
                 Log::debug($a);
            }
        }
     }

}

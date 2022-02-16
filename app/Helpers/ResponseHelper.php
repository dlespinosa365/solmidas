<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Lang;

class ResponseHelper
{
    static function sendSuccess($data,  $code) {
        return response(['success'=> true, 'data' => $data], $code ? $code : 200);
    }

    static function sendError($message, $code) {
        return response(['success' => false, 'message' => Lang::get($message)], $code ? $code : 500);
    }
}

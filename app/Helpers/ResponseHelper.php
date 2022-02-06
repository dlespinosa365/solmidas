<?php

namespace App\Helpers;

class ResponseHelper
{
    static function sendSuccess($data,  $code) {
        return response(['success'=> true, 'data' => $data], $code ? $code : 200);
    }

    static function sendError($message, $code) {
        return response(['success' => false, 'message' => $message], $code ? $code : 500);
    }
}

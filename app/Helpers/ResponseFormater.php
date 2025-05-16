<?php

namespace App\Helpers;

class ResponseFormater
{
    public static function success($data = null, $message = null, $code  = 200)
    {
        return response()->json([ 
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }


    public static function error($message = "Something went wrong", $code  = 500, $errors = null) {
        $response = [
            'status' => false,
            'message' => $message,
        ];

        if (!is_null($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }
}
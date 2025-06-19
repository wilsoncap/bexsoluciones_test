<?php

namespace App\src\utils;



class ApiResponse
{
    public static function success($data = [], $message = 'OK', $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function error( $data = [], $message = 'Error', $code = 400 )
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function updateFailed($data = [], $message = 'No se pudo actualizar', $code = 422)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
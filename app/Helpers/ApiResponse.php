<?php

if (!function_exists('success')) {
    function success($data = null, string $message = 'Success', int $code = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

if (!function_exists('error')) {
    function error(string $message = 'Error', int $code = 400, $data = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

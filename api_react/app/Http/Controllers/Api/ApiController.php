<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function sendResponse($data, $message)
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response,200);
    }

    public function sendError($error, $errors = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
            'errors' => $errors
        ];

        return  response()->json($response,$code);
    }

}

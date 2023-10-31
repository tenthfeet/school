<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    protected function responseWithSuccess($message = '', $data = [], $code = Response::HTTP_OK): JsonResponse
    {
        if (!empty($data)) {
            return response()->json([
                'message' => $message,
                'data' => $data,
            ], $code);
        }

        return response()->json([
            'message' => $message,
        ], $code);
    }

    protected function responseWithError(
        $message = '',
        $errors = [],
        $code = Response::HTTP_INTERNAL_SERVER_ERROR
    ): JsonResponse {
        if (!empty($errors)) {
            return response()->json([
                'message' => $message,
                'errors' => $errors,
            ], $code);
        }

        return response()->json([
            'message' => $message,
        ], $code);
    }
}

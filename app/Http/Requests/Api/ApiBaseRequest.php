<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Nette\Schema\ValidationException;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiBaseRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors(),
            ],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            ));
    }

    public function failedAuthorization()
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Unauthorized Access',
                'errors' => (object) [
                    'email' => 'This credentials do not match our records.'
                ],
            ],
                Response::HTTP_FORBIDDEN,
            ));
    }

    // throttled requests exception with message
    protected function sendLockoutResponse(array $message)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Too Many Attempts.',
                'errors' => (object) $message,
            ],
                Response::HTTP_TOO_MANY_REQUESTS,
            ));
    }
}

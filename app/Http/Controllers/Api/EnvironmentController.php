<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EnvFileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class EnvironmentController extends Controller
{
    /**
     * @param  EnvFileService  $envFileService
     */
    public function __construct(protected EnvFileService $envFileService)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function show(Request $request) : JsonResponse
    {
        $envDetails = $this->envFileService->getAllEnv($request);

        return $this->responseWithSuccess('Get .Env File Data', $envDetails);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function update(Request $request) : JsonResponse
    {
        $updateEnvDetails = $this->envFileService->updateEnv($request);

        if($updateEnvDetails->isEmpty()) {
            return $this->responseWithError( code: Response::HTTP_NO_CONTENT);
        }

        return $this->responseWithSuccess('Update .Env File Data', $updateEnvDetails);
    }

}

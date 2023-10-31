<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralSettingsResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return JsonResponse
     */
    public function __invoke()
    {
        $data['logo'] = getSettings('logo');
        $data['favicon'] = getSettings('favicon');
        $data['dark_logo'] = getSettings('dark_logo');
        $data['guest_logo'] = getSettings('guest_logo');
        $data['guest_background'] = getSettings('guest_background');

        return $this->responseWithSuccess('General Settings', GeneralSettingsResource::make((object)$data));
    }
}

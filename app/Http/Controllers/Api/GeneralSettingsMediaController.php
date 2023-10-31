<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSetting\UpdateGeneralSettingRequest;
use App\Models\GeneralSetting;
use App\Settings\GeneralSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GeneralSettingsMediaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  UpdateGeneralSettingRequest  $request
     * @param  GeneralSettings  $logoSettings
     * @return JsonResponse
     */
    public function __invoke(UpdateGeneralSettingRequest $request, GeneralSettings $generalSettings)
    {
        $isUpload = false;
        if ($request->hasFile('logo')) {
            $generalSettingsImage = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'logo')
                ->first();
            $generalSettingsImage->clearMediaCollection('logo');
            $generalSettingsImage->addMediaFromRequest('logo')->toMediaCollection('logo');
            $generalSettings->logo = $generalSettingsImage->getFirstMediaUrl('logo');
            $generalSettings->save();
            $isUpload = true;
        }
        if ($request->hasFile('favicon')) {
            $generalSettingsImage = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'favicon')
                ->first();
            $generalSettingsImage->clearMediaCollection('favicon');
            $generalSettingsImage->addMediaFromRequest('favicon')->toMediaCollection('favicon');
            $generalSettings->favicon = $generalSettingsImage->getFirstMediaUrl('favicon');
            $generalSettings->save();
            $isUpload = true;
        }
        if ($request->hasFile('dark_logo')) {
            $generalSettingsImage = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'dark_logo')
                ->first();
            $generalSettingsImage->clearMediaCollection('dark_logo');
            $generalSettingsImage->addMediaFromRequest('dark_logo')->toMediaCollection('dark_logo');
            $generalSettings->dark_logo = $generalSettingsImage->getFirstMediaUrl('dark_logo');
            $generalSettings->save();
            $isUpload = true;
        }
        if ($request->hasFile('guest_logo')) {
            $generalSettingsImage = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'guest_logo')
                ->first();
            $generalSettingsImage->clearMediaCollection('guest_logo');
            $generalSettingsImage->addMediaFromRequest('guest_logo')->toMediaCollection('guest_logo');
            $generalSettings->guest_logo = $generalSettingsImage->getFirstMediaUrl('guest_logo');
            $generalSettings->save();
            $isUpload = true;
        }
        if ($request->hasFile('guest_background')) {
            $generalSettingsImage = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'guest_background')
                ->first();
            $generalSettingsImage->clearMediaCollection('guest_background');
            $generalSettingsImage->addMediaFromRequest('guest_background')->toMediaCollection('guest_background');
            $generalSettings->guest_background = $generalSettingsImage->getFirstMediaUrl('guest_background');
            $generalSettings->save();
            $isUpload = true;
        }

        if($isUpload){
            return $this->responseWithSuccess('Image updated successfully');
        }

        return $this->responseWithSuccess('No image uploaded');
    }
}

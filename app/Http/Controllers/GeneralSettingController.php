<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSetting\UpdateGeneralSettingRequest;
use App\Models\GeneralSetting;
use App\Services\EnvFileService;
use App\Settings\GeneralSettings;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeneralSettingController extends Controller
{
    /**
     * @param  EnvFileService  $envFileService
     */
    public function __construct(protected EnvFileService $envFileService)
    {

    }
    /**
     * Show the form for creating the resource.
     *
     * @return void
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param  Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the resource.
     *
     * @return void
     */
    public function show()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/settings',
                'active' => true
            ],

        ];

        return view('general-settings.index', [
            'pageTitle' => 'Settings',
            'breadcrumbItems' => $breadcrumbsItems,
        ]);
    }

    /**
     * Show the form for editing the resource.
     *
     * @return Application|Factory|View
     */
    public function edit(GeneralSettings $generalSettings)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false,
            ],
            [
                'name' => 'General Settings',
                'url' => '#',
                'active' => true
            ],

        ];

        $envDetails = $this->envFileService->getAllEnv();
        $logoDetails = [
            'logoSrc' => $generalSettings->logo,
            'darkLogoSrc' => $generalSettings->dark_logo,
            'faviconSrc' => $generalSettings->favicon,
            'guestLogoSrc' => $generalSettings->guest_logo,
            'guestBackgroundSrc' => $generalSettings->guest_background,
        ];

        return view('general-settings.edit', [
            'pageTitle' => 'General Settings',
            'breadcrumbItems' => $breadcrumbsItems,
            'envDetails' => $envDetails,
            'logoDetails' => $logoDetails,
        ]);
    }

    /**
     * Update the resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $this->envFileService->updateEnv($request);

        return back()->with(['message' => 'General settings updated successfully.', 'type' => 'success']);
    }

    /**
     * Remove the resource from storage.
     *
     * @return void
     */
    public function destroy()
    {
        abort(404);
    }

    public function logoUpdate(UpdateGeneralSettingRequest $request, GeneralSettings $logoSettings)
    {
        if ($request->hasFile('logo')) {
            $generalSetting = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'logo')
                ->first();
            $generalSetting->clearMediaCollection('logo');
            $generalSetting->addMediaFromRequest('logo')->toMediaCollection('logo');
            $logoSettings->logo = $generalSetting->getFirstMediaUrl('logo');
            $logoSettings->save();
        }
        if ($request->hasFile('favicon')) {
            $generalSetting = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'favicon')
                ->first();
            $generalSetting->clearMediaCollection('favicon');
            $generalSetting->addMediaFromRequest('favicon')->toMediaCollection('favicon');
            $logoSettings->favicon = $generalSetting->getFirstMediaUrl('favicon');
            $logoSettings->save();
        }
        if ($request->hasFile('dark_logo')) {
            $generalSetting = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'dark_logo')
                ->first();
            $generalSetting->clearMediaCollection('dark_logo');
            $generalSetting->addMediaFromRequest('dark_logo')->toMediaCollection('dark_logo');
            $logoSettings->dark_logo = $generalSetting->getFirstMediaUrl('dark_logo');
            $logoSettings->save();
        }
        if ($request->hasFile('guest_logo')) {
            $generalSetting = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'guest_logo')
                ->first();
            $generalSetting->clearMediaCollection('guest_logo');
            $generalSetting->addMediaFromRequest('guest_logo')->toMediaCollection('guest_logo');
            $logoSettings->guest_logo = $generalSetting->getFirstMediaUrl('guest_logo');
            $logoSettings->save();
        }
        if ($request->hasFile('guest_background')) {
            $generalSetting = GeneralSetting::where('group', 'general-settings')
                ->where('name', 'guest_background')
                ->first();
            $generalSetting->clearMediaCollection('guest_background');
            $generalSetting->addMediaFromRequest('guest_background')->toMediaCollection('guest_background');
            $logoSettings->guest_background = $generalSetting->getFirstMediaUrl('guest_background');
            $logoSettings->save();
        }

        return back()->with(['message' => 'Logo updated successfully.', 'type' => 'success']);
    }

}

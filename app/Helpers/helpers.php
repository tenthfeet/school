<?php

use App\Settings\GeneralSettings;

function getSettings($key)
{
    return app(GeneralSettings::class)->$key ?? null;
}


function getSelected(): string
{
    if (request()->routeIs('users.*')) {
        return 'tab_two';
    } elseif (request()->routeIs('permissions.*')) {
        return 'tab_three';
    } elseif (request()->routeIs('roles.*')) {
        return 'tab_three';
    } elseif (request()->routeIs('database-backups.*')) {
        return 'tab_four';
    } elseif (request()->routeIs('general-settings.*')) {
        return 'tab_five';
    } elseif (request()->routeIs('dashboards.*')) {
        return 'tab_one';
    } else {
        return 'tab_one';
    }
}
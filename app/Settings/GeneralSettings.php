<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $logo;
    public string $favicon;
    public string $dark_logo;
    public string $guest_logo;
    public string $guest_background;


    public static function group(): string
    {
        return 'general-settings';
    }
}
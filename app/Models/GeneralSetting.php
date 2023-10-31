<?php

namespace App\Models;

use Spatie\LaravelSettings\Models\SettingsProperty;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GeneralSetting extends SettingsProperty  implements HasMedia
{
    use InteractsWithMedia;

}

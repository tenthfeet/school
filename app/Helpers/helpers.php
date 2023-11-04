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

/**
 * Generate HTML options from an array.
 *
 * This function takes an array and generates HTML options based on the array elements.
 * It can be used to populate a select dropdown with values from the array.
 *
 * @param  array  $array The array containing the options.
 * @param  string  $value The selected value(s), separated by commas. Defaults to an empty string.
 * @param  string  $placeholder The placeholder text for the default option. Defaults to an empty string.
 * @param  bool  $readonly Determines if the dropdown is disabled. Defaults to false.
 * @return string The generated HTML options as a string.
 */
function optionsFromArray(array $array, string $value = '', string $placeholder = '', bool $readonly = false): string
{
    $disabledAttribute = $readonly ? 'disabled' : '';
    $options = '';

    if (!empty($placeholder)) {
        $options .= "<option value='' $disabledAttribute>--Select $placeholder--</option>";
    }

    $selectedValues = explode(',', $value);

    foreach ($array as $key => $val) {
        $selected = in_array($key, $selectedValues) ? 'selected' : '';
        $options .= "<option value='$key' $selected>$val</option>";
    }

    return $options;
}
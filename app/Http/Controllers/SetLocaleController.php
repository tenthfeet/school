<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class SetLocaleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $locale
     * @return RedirectResponse
     */
    public function __invoke($locale)
    {
        $availableLocales = config('app.available_locales');
        if (array_key_exists($locale, $availableLocales)) {
            return redirect()->back()->withCookie(cookie()->forever('locale', $locale));
        }
        return redirect()->back();
    }
}

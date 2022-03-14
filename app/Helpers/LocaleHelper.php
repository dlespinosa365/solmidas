<?php

namespace App\Helpers;

class LocaleHelper
{
    public static function getLocales() {
        $locales = config('app.available_locales');
        $availableLocales = [];
        foreach ($locales as $key => $locale) {
            array_push($availableLocales, $locale);
        }
        return $availableLocales;
    }

}

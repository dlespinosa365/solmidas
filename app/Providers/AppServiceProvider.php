<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use App\Helpers\LocaleHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('translatable', function ($fieldName) {
            $locales = LocaleHelper::getLocales();
            foreach ($locales as $locale) {
                $this->longText($fieldName.'_' .$locale)->nullable();
            }
        });
    }
}

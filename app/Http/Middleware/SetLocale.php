<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Helpers\LocaleHelper;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $availableLocales = LocaleHelper::getLocales();
        if ($request->header('Accept-Language') && in_array($request->header('Accept-Language'), $availableLocales)) {
            App::setLocale($request->header('Accept-Language'));
        } else {
            App::setLocale('es');
        }
            
        return $next($request);
    }
}

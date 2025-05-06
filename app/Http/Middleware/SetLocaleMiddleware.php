<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\SetLocaleMiddleware;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $localeLanguage = session('locale', 'it');
        App::setLocale($localeLanguage);
        return $next($request);
    }
}

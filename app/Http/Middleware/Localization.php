<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
use App\Models\Role;
use App\Models\Setting;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (env('DB_DATABASE')) {
          
            if (auth()->check()) 
            {
                if (!auth()->user()->hasAnyRole(Role::all()) && auth()->user()->language) {
                    $language = auth()->user()->language;
                }
                else{
                $language = Setting::first()->language;
                }
            }
            elseif(session()->has('locale') && session()->has('direction'))
            {
                $language = session()->get('locale');             
            }
            else
            {
                $language = Setting::first()->language;
            }
            if ($language) {
                $direction = \App\Models\Language::where('name',$language)->first()->direction;
                App::setLocale($language);
                session()->put('locale',$language);
                session()->put('direction',$direction);
            }
        }
        return $next($request);
    }
}

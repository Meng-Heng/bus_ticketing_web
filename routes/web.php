<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

        /*
            Using Google Translate
        */

        // Route::get('/fr', function() {
        //     return GoogleTranslate::trans('Bye', 'es');
        // });

        // ------------------------

        /*
            Simplified request for Locale
        */
        // Route::get('/language/{locale?}', function ($locale = null) {
        //     if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        //         app()->setLocale($locale);
        //     }
            
        //     return view('welcome');
        // });

        // ---------------------------------

Route::get('/language/{locale}', function ($locale) {
   app()->setLocale($locale);
   session()->put('locale', $locale);

   return redirect()->back();
});

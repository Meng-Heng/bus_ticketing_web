<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fr', function() {
    return GoogleTranslate::trans('Bye', 'es');
});

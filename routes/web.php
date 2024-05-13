<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Guest/welcome');
});

Route::get('/proba', function () {
    return view('Guest/proba');
});

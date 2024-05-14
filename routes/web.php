<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Guest/welcome');
});
Route::get('/parts', function () {
    return view('Guest/parts');
});
Route::get('/register', function () {
    return view('Registration/register');
});
Route::get('/login', function () {
    return view('Registration/login');
});

Route::get('/cars', function () {
    return view('Guest/proba');
});

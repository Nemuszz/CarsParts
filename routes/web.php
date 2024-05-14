<?php

use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {
   Route::post('/user/login', 'login')->name('user.login');
   Route::post('/user/register', 'register')->name('user.register');

});

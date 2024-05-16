<?php

use App\Http\Controllers\CarController;
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

Route::controller(UserController::class)->prefix('/user')->group(function () {
   Route::post('/login', 'login')->name('user.login');
   Route::post('/register', 'register')->name('user.register');
   Route::get('/logout', 'logout')->name('user.logout');
   Route::get('/profile/{id}', 'profile')->name('user.profile');
   Route::post('/profile/edit/{id}', 'edit')->name('user.edit');
});


Route::controller(CarController::class)->middleware(['auth'])->prefix('/car')->group(function () {
    Route::get('/add', 'add')->name('car.add');
    Route::post('/add/user_car', 'insert')->name('car.insert');



});

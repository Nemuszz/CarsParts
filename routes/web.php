<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
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


Route::get('/cars',[CarController::class, 'index'])->name('cars');
Route::get('/search',[CarController::class, 'search'])->name('search');


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
    Route::get('/your/{id}','yours')->name('car.yours');
    Route::get('/your/permalink/{car}','permalink')->name('car.permalink');
    Route::get('/your/delete/{car}','delete')->name('car.delete');
    Route::get('/your/change/{car}','changeCar')->name('car.change');
    Route::post('/your/update/{car}','update')->name('car.update');

});

Route::controller(AdminController::class)->middleware([AdminMiddleware::class])->prefix('/admin')->group(function () {
    Route::get('/page', 'adminHome')->name('admin.page');
    Route::get('/users', 'adminUsers')->name('admin.users');
    Route::get('/permalink/{car}','adminPermalink')->name('admin.permalink');
    Route::get('/delete/{car}','adminDelete')->name('admin.delete');
    Route::get('/check/{car}','adminCheck')->name('admin.check');


});

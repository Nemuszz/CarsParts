<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('Guest/welcome');
});
Route::get('/parts', function () {return view('Guest/parts');
});
Route::get('/register', function () {return view('Registration/register');
});
Route::get('/login', function () {return view('Registration/login');
});

Route::controller(UserController::class)->prefix('/user')->group(function () {
    Route::post('/login', 'login')->name('user.login');
    Route::post('/register', 'register')->name('user.register');

});

Route::controller(UserController::class)->middleware(AuthMiddleware::class)->prefix('/user')->group(function () {
    Route::get('/logout', 'logout')->name('user.logout');
    Route::get('/profile/{id}', 'profile')->name('user.profile');
    Route::post('/profile/edit/{id}', 'edit')->name('user.edit');
    Route::get('/contact/{id}', 'contact')->name('user.contact');
    Route::post('/message/{id}', 'message')->name('user.message');
    Route::get('/cart', 'userCart')->name('user.cart');
    Route::post('/wishlist', 'wishList')->name('user.wishList');
    Route::post('/wishlist/delete', 'removeFromWishList')->name('user.wishList.delete');
});

Route::controller(AdminController::class)->middleware([AdminMiddleware::class])->prefix('/admin')->group(function () {
    Route::get('/page', 'adminHome')->name('admin.page');
    Route::get('/users', 'adminUsers')->name('admin.users');
    Route::get('/permalink/{car}','adminPermalink')->name('admin.permalink');
    Route::get('/delete/{car}','adminDelete')->name('admin.delete');
    Route::get('/check/{car}','adminCheck')->name('admin.check');
    Route::get('/messages','adminMessages')->name('admin.messages');
    Route::get('/parts/add','adminPartsAdd')->name('admin.parts.add');
    Route::post('/parts/insert','adminPartsInsert')->name('admin.parts.insert');
    Route::get('/orders','adminOrders')->name('admin.orders');

});


Route::get('/cars',[CarController::class, 'index'])->name('cars');
Route::get('/search',[CarController::class, 'search'])->name('search');

Route::controller(CarController::class)->middleware(AuthMiddleware::class)->prefix('/car')->group(function () {
    Route::get('/add', 'add')->name('car.add');
    Route::post('/add/user_car', 'insert')->name('car.insert');
    Route::get('/your/{id}','yours')->name('car.yours');
    Route::get('/your/permalink/{car}','permalink')->name('car.permalink');
    Route::get('/your/delete/{car}','delete')->name('car.delete');
    Route::get('/your/change/{car}','changeCar')->name('car.change');
    Route::post('/your/update/{car}','update')->name('car.update');
});


Route::controller(PartsController::class)->middleware(AuthMiddleware::class)->prefix('/parts')->group(function () {
    Route::get('/', 'parts')->name('parts');
    Route::get('/search', 'partSearch')->name('parts.search');
    Route::get('/delete/{part}', 'partDelete')->name('parts.delete');
    Route::post('/amount/{part}', 'partAmount')->name('parts.amount.insert');
    Route::get('/permalink/{part}','partPermalink')->name('parts.permalink');

});
Route::controller(CartController::class)->middleware(AuthMiddleware::class)->prefix('/cart')->group(function () {
    Route::post('/cart/add', 'addToCart')->name('cart.add');
    Route::get('/cart/remove/{partId}', 'removeToCart')->name('cart.remove');
    Route::post('/cart/purchase', 'purchaseToCart')->name('cart.purchase');

});







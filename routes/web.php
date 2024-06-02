<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreenLockController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Pages.home');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::resource('profile', ProfileController::class);

Route::group(['prefix' => '/dashboard/vendor', 'as' => 'vendor.', 'middleware' => 'role:3'],function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/lock-screen',[ScreenLockController::class, 'lockscreen'])->name('lockscreen');
    Route::post('/lock',[ScreenLockController::class, 'lock'])->name('lock');
    Route::post('/unlock',[ScreenLockController::class, 'unlock'])->name('unlock');

    Route::resource('/products', ProductsController::class);
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

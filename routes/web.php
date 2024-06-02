<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreenLockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('vendor_dashboard.products.add_products');
});
// Route::get('/', function () {
//     return view('Pages.home');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Route::get('/', [HomeController::class, 'home'])->name('home');
Route::resource('profile', ProfileController::class);

Route::controller(ScreenLockController::class)->group(function () {
    Route::get('/lock-screen', 'lockscreen')->name('lockscreen');
    Route::post('/lock', 'lock')->name('lock');
    Route::post('/unlock', 'unlock')->name('unlock');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

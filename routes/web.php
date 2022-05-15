<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('show');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::middleware('auth')->prefix('administrator')->group(function () {
    Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::resource('/setting', \App\Http\Controllers\SettingController::class);
    Route::resource('/slider', \App\Http\Controllers\SliderController::class);
    Route::resource('/about', \App\Http\Controllers\AboutController::class);
    Route::resource('/gallery', \App\Http\Controllers\GalleryController::class);
    Route::resource('/contact',\App\Http\Controllers\ContactController::class);

});
Route::post('/insertcontact',[\App\Http\Controllers\ContactController::class,'store'])->name('contact.data');

<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/gallery', 'gallery');
});

Auth::routes();

Route::prefix('/admin')->controller(AdminController::class)->middleware(['auth', 'permission'])->group(function(){
    Route::get('/', 'index')->name('admin');
    Route::get('/galleries', 'galleries')->name('admin.galleries');
    Route::get('/tags', 'tags')->name('admin.tags');
});

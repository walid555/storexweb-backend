<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UsersController;
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

//Admin Auth Routes

Route::group(['middleware' => ['web'], 'as' => 'admin:', 'prefix' => 'admin-panel'], function () {

    \Auth::routes();

});

// Admin Modules Routes

Route::group(['middleware' => ['web', 'CheckAdmin'], 'as' => 'admin:', 'prefix' =>'admin-panel'],
    function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UsersController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update' , 'destroy']);
        Route::resource('categories', CategoriesController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update' , 'destroy']);
        Route::resource('movies', MoviesController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update' , 'destroy']);

    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

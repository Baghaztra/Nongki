<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CornerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FECornerController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('admin/dashboard', AdminController::class);
Route::get('get-data-recomendation', [AdminController::class, 'getAllData']);
Route::resource('admin/corner', CornerController::class);
Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/facilities', FacilityController::class);
Route::resource('admin/users', UserController::class);
Route::get('get-data-corner', [CornerController::class, 'getAllData']);
Route::get('get-data-categories', [CategoryController::class, 'getAllData']);
Route::get('get-data-facilities', [FacilityController::class, 'getAllData']);
Route::get('get-data-users', [UserController::class, 'getAllData']);



Route::get('/home', [FECornerController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

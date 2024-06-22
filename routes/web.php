<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CornerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FECornerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('admin/corner', CornerController::class);
Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/facilities', FacilityController::class);
Route::resource('admin/users', UserController::class);
Route::get('get-data-corner', [CornerController::class, 'getAllData']);
Route::get('get-data-categories', [CategoryController::class, 'getAllData']);
Route::get('get-data-facilities', [FacilityController::class, 'getAllData']);
Route::get('get-data-users', [UserController::class, 'getAllData']);

Route::get('/home', [FECornerController::class, 'index']);
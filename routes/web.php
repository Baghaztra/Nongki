<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CornerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/admin/corner', CornerController::class);
Route::resource('admin/categories', CategoryController::class);
Route::get('get-data-categories', [CategoryController::class, 'getGetAllData']);
Route::get('get-data-facilities', [FacilityController::class, 'getGetAllData']);

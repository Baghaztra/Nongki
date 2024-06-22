<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CornerController;

Route::get('/', function () {
    return view('admin.categori.index');
});

Route::resource('/admin/corner', CornerController::class);
Route::resource('admin/categories', CategoryController::class);
Route::get('get-data-categories', [CategoryController::class, 'getGetAllData']);
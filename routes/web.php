<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CornerController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/admin/corner', CornerController::class);
Route::resource('admin/kategori', CategoryController::class);
Route::get('get-data-kategori', [CategoryController::class, 'getGetAllData']);

<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.categori.index');
});

Route::resource('admin/kategori', CategoryController::class);
Route::get('get-data-kategori', [CategoryController::class, 'getGetAllData']);
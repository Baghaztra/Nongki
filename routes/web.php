<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.categori.index');
});

Route::resource('kategori', CategoryController::class);
<?php

use App\Http\Controllers\CornerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [CornerController::class, 'index']);

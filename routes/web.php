<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/kost', function () {
    return view('welcome');
});

// Route::get('/kost', [KostController::class, 'welcome']);

<?php

use App\Http\Controllers\Admin\profileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeBannerController;

Route::get("/dashboard", function () {
    return view("admin/index");
});


// Profile Section
Route::get('/profile', [profileController::class, 'index']);
Route::post('/saveProfile', [profileController::class, 'store']);

// Home Banner Section
Route::get('/home_banner', [homeBannerController::class, 'index']);
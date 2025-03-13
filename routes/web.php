<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Authentication Routing

Route::get('login', [AuthController::class, 'doShowLoginForm'])->name('doShowFormLogin');
Route::post('dologin', [AuthController::class, 'login'])->name('doLogin');
Route::post('dologout', [AuthController::class, 'logout'])->name('logout');





Route::get('/register', function() {
    return view('auth.register');
});

Route::get('admin/dashboard', function ($id) {
    return view('dashboard.maindash');
});

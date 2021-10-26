<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\SessionsController;

Route::get('/', function () {
    return view('home');
});

//Auth::routes();

Route::get('/register', [App\Http\Controllers\RegistrarController::class, 'create'])->name('register.index');
Route::post('/register', [App\Http\Controllers\RegistrarController::class, 'store'])->name('register.store');
Route::get('/login', [App\Http\Controllers\SessionsController::class, 'create'])->name('login.index');


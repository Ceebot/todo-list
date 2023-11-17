<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Notes\NoteController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'login'])
    ->name('login');

Route::get('logout', [LoginController::class, 'logout'])
    ->middleware('auth:api')
    ->name('logout');

Route::get('user', [LoginController::class, 'user'])
    ->middleware('auth:api');

Route::resource('notes', NoteController::class)
    ->middleware('auth:api');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Me\UserController;

Route::get('me', [UserController::class, 'index'])
    ->middleware(['auth'])
    ->name('me.user.profile');

Route::get('me/settings', [UserController::class, 'settings'])
    ->middleware(['auth'])
    ->name('me.user.settings');

Route::patch('me/settings', [UserController::class, 'updateSettings'])
    ->middleware(['auth'])
    ->name('me.user.update-settings');

Route::get('me/password', [UserController::class, 'password'])
    ->middleware(['auth'])
    ->name('me.user.password');

Route::patch('me/password', [UserController::class, 'updatePassword'])
    ->middleware(['auth'])
    ->name('me.user.update-password');
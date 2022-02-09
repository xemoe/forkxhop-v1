<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;

//
// Domain admin.users.*
// - GET  index
// - GET  create
// - POST create
//

Route::get('/admin/users', [UsersController::class, 'index'])
    ->middleware(['auth', 'role:root|admin',])
    ->name('admin.users.index');

Route::get('/admin/users/create', [UsersController::class, 'create'])
    ->middleware(['auth', 'role:root|admin',])
    ->name('admin.users.create');

Route::post('/admin/users/create', [UsersController::class, 'store'])
    ->middleware(['auth', 'role:root|admin',])
    ->name('admin.users.post-create');

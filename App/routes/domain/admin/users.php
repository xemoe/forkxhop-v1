<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;

Route::resource('admin/users', UsersController::class)
    ->only(['index', 'create', 'store', 'show'])
    ->middleware(['auth', 'role:root|admin',])
    ->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
    ]);

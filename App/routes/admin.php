<?php

Route::get('/admin/users', function () {
    return [];
})->middleware(['auth', 'role:root|admin',])
    ->name('admin.user-management.index');

Route::get('/admin/users/create', function () {
    return [];
})->middleware(['auth', 'role:root|admin',])
    ->name('admin.user-management.create');

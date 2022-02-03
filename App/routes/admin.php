<?php

Route::get('/admin/users', function () {
    return [];
})->middleware([
    'auth',
    'role:root|admin',
])->name('admin.user-management.show');

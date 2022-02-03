<?php

namespace App\Models\Contracts;

interface WithRolesName {
    const ROLE_ROOT_USER = 'root';
    const ROLE_ADMIN_USER = 'admin';
    const ROLE_SIMPLE_USER = 'simple';
}

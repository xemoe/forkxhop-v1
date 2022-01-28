<header class="header header-sticky mb-4">
    <div class="container-fluid">

        <button class="header-toggler px-md-0 me-md-3"
                type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-menu"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
        </a>

        <!-- QuickMenu 1 (Left Side) -->
        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        </ul>

        <!-- QuickMenu 2 (Right Side) -->
        <ul class="header-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-bell"></use>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-list-rich"></use>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-envelope-open"></use>
                    </svg>
                </a>
            </li>
        </ul>

        <!-- QuickMenu 3 (UserMenu) -->
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">

                <!-- UserAvatar -->
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md">
                        <img class="avatar-img" src="assets/img/avatars/8.jpg" alt="user@email.com">
                    </div>
                </a>

                <!-- DropdownMenu -->
                <div class="dropdown-menu dropdown-menu-end pt-0">

                    <!-- DropdownMenu Group 1 -->
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-bell"></use>
                        </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-envelope-open"></use>
                        </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-task"></use>
                        </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-comment-square"></use>
                        </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span>
                    </a>

                    <!-- DropdownMenu Group 2 -->
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                    </div>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-user"></use>
                        </svg> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-settings"></use>
                        </svg> Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-credit-card"></use>
                        </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-file"></use>
                        </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span>
                    </a>

                    <!-- DropdownMenu Group 3 -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-lock-locked"></use>
                        </svg> Lock Account
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-account-logout"></use>
                        </svg> Logout
                    </a>

                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>

    <div class="container-fluid">
        <!-- Breadcrumb -->
        <x-dashboard.container-breadcrumb-example></x-dashboard.container-breadcrumb-example>
    </div>

</header>

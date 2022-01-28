<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">

    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('/svg/brand/cib-coreui.svg') }}#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('/svg/brand/cib-coreui.svg') }}#signet"></use>
        </svg>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">
                                    <x-dashboard.nav-icon :icon="'cil-speedometer'" :label="'Dashboard'"></x-dashboard.nav-icon>
                                    <span class="badge badge-sm bg-info ms-auto">NEW</span>
                                </a>
                            </li>
                            <li class="nav-title">Theme</li>
                            <li class="nav-item">
                                <a class="nav-link" href="colors.html">
                                    <x-dashboard.nav-icon :icon="'cil-drop'" :label="'Colors'"></x-dashboard.nav-icon>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="typography.html">
                                    <x-dashboard.nav-icon :icon="'cil-pencil'" :label="'Typography'"></x-dashboard.nav-icon>
                                </a>
                            </li>
                            <li class="nav-title">Components</li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle" href="#">
                                    <x-dashboard.nav-icon :icon="'cil-puzzle'" :label="'Base'"></x-dashboard.nav-icon>
                                </a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span class="nav-icon"></span> Accordion</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span class="nav-icon"></span> Breadcrumb</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="charts.html">
                                    <x-dashboard.nav-icon :icon="'cil-chart-pie'" :label="'Charts'"></x-dashboard.nav-icon>
                                </a>
                            </li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle" href="#">
                                    <x-dashboard.nav-icon :icon="'cil-star'" :label="'Icons'"></x-dashboard.nav-icon>
                                </a>
                                <ul class="nav-group-items">
                                    <li class="nav-item">
                                        <a class="nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons
                                            <span class="badge badge-sm bg-success ms-auto">Free</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="widgets.html">
                                    <x-dashboard.nav-icon :icon="'cil-calculator'" :label="'Widgets'"></x-dashboard.nav-icon>
                                    <span class="badge badge-sm bg-info ms-auto">NEW</span>
                                </a>
                            </li>
                            <li class="nav-divider"></li>
                            <li class="nav-title">Extras</li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle" href="#">
                                    <x-dashboard.nav-icon :icon="'cil-star'" :label="'Pages'"></x-dashboard.nav-icon>
                                </a>
                                <ul class="nav-group-items">
                                    <li class="nav-item">
                                        <a class="nav-link" href="login.html" target="_top">
                                            <x-dashboard.nav-icon :icon="'cil-account-logout'" :label="'Login'"></x-dashboard.nav-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="register.html" target="_top">
                                            <x-dashboard.nav-icon :icon="'cil-account-logout'" :label="'Register'"></x-dashboard.nav-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="404.html" target="_top">
                                            <x-dashboard.nav-icon :icon="'cil-bug'" :label="'Error 404'"></x-dashboard.nav-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="500.html" target="_top">
                                            <x-dashboard.nav-icon :icon="'cil-bug'" :label="'Error 500'"></x-dashboard.nav-icon>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item mt-auto">
                                <a class="nav-link" href="docs.html">
                                    <x-dashboard.nav-icon :icon="'cil-description'" :label="'Docs'"></x-dashboard.nav-icon>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
                                    <x-dashboard.nav-icon :icon="'cil-layers'" :label="'Try CoreUI'"></x-dashboard.nav-icon>
                                    <div class="fw-semibold">PRO</div>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 841px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div><div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </ul>
    <button class="sidebar-toggler" type="button"></button>
</div>

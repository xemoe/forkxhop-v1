@props([
    'menuSettings' => [],
])

<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex"></div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            @foreach ($menuSettings as $menuItem)
                                @if (isset($menuItem['name']))
                                    <x-dashboard.sidebar.menu-l1
                                        :name="$menuItem['name']" :route="$menuItem['route']"
                                        :icon="$menuItem['icon']" :badge="$menuItem['badge']"/>
                                @elseif (isset($menuItem['group']))
                                    <x-dashboard.sidebar.group-l1
                                        :group="$menuItem['group']" :child="$menuItem['child']"/>
                                @endif
                            @endforeach

                            <!-- Sticky bottom menu item -->
                            <li class="nav-divider"></li>
                            <li class="nav-item mt-auto">
                                <a class="nav-link" href="docs.html">
                                    <x-dashboard.sidebar.nav-icon :icon="'cil-description'" :label="'Docs'"/>
                                </a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button class="btn btn-link nav-link nav-link-danger" target="_top" type="submit">
                                        <x-dashboard.sidebar.nav-icon :icon="'cil-account-logout'" :label="'Logout'"/>
                                    </button>
                                </form>
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

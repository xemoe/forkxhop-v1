@props([
    'headerSettings' => [],
    'breadcrumb' => [],
])

<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <x-dashboard.container.toggler-menu/>
        <x-dashboard.container.quick-menu :quickMenu="$headerSettings['quickMenu']"/>
        <x-dashboard.container.notifications-menu :notificationsMenu="$headerSettings['notificationsMenu']"/>
        <x-dashboard.container.user-menu :userMenu="$headerSettings['userMenu']"/>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <x-dashboard.container.breadcrumb :breadcrumb="$breadcrumb"/>
    </div>
</header>

@props([
    'name' => 'Undefined Menu',
    'route' => '#undefined',
    'icon' => 'cil-circle',
    'badge' => '',
])

<li class="nav-item">
    <a class="nav-link" href="{{ $route }}">
        <x-dashboard.sidebar.nav-icon :icon="$icon" :label="$name"/>
        @if(strlen($badge))
            <span class="badge badge-sm bg-info ms-auto">{{ $badge }}</span>
        @endif
    </a>
</li>

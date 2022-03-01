@props([
    'name' => 'Undefined Menu',
    'route' => '#undefined',
    'badge' => '',
])

<li class="nav-item">
    <a class="nav-link" href="{{ $route }}"> {{ $name }}
        @if(strlen($badge))
            <span class="badge badge-sm bg-info ms-auto">{{ $badge }}</span>
        @endif
    </a>
</li>

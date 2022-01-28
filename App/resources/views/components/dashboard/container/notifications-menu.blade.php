@props([
    'notificationsMenu' => [],
])

<ul class="header-nav ms-auto">
    @foreach ($notificationsMenu as $icon => $route)
    <li class="nav-item">
        <a class="nav-link" href="{{ $route }}">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#{{ $icon }}"/>
            </svg>
        </a>
    </li>
    @endforeach
</ul>

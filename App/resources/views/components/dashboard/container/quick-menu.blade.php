@props([
    'quickMenu' => [],
])

<ul class="header-nav d-none d-md-flex">
    @foreach ($quickMenu as $name => $route)
    <li class="nav-item"><a class="nav-link" href="{{ $route }}">{{ $name }}</a></li>
    @endforeach
</ul>

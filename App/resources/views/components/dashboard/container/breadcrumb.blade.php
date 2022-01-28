@props([
    'breadcrumb' => [],
])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb my-0 ms-2">
        @foreach ($breadcrumb as $item)
            <li class="breadcrumb-item {{ isset($item['active']) ? $item['active'] : '' }}">
                <span>
                    <a style="text-decoration: none;">{{ $item['name'] }}</a>
                </span>
            </li>
        @endforeach
    </ol>
</nav>

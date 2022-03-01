@props([
    'group' => 'Undefined Group',
    'icon' => 'cil-circle',
    'child' => [],
])

<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <x-dashboard.sidebar.nav-icon :icon="$icon" :label="$group"/>
    </a>
    <ul class="nav-group-items">
        @foreach($child as $item)
            @if (isset($item['name']))
                <x-dashboard.sidebar.menu-l3
                    :name="$item['name']" :route="$item['route']"
                    :badge="$item['badge'] ?? ''"/>
            @endif
        @endforeach
    </ul>
</li>

@props([
    'group' => 'Undefined Group',
    'child' => [],
])

<li class="nav-title">{{ $group }}</li>
@foreach($child as $item)
    @if (isset($item['name']))
        <x-dashboard.sidebar.menu-l2
            :name="$item['name']" :route="$item['route']"
            :icon="$item['icon']" :badge="$item['badge'] ?? ''"/>
    @elseif (isset($item['group']))
        <x-dashboard.sidebar.group-l2 :group="$item['group']" :icon="$item['icon']" :child="$item['child']"/>
    @endif
@endforeach

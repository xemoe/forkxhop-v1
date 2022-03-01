@props(['icon' => 'cil-user','label' => ''])

<svg class="nav-icon">
    <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#{{ $icon }}"/>
</svg> {{ $label }}

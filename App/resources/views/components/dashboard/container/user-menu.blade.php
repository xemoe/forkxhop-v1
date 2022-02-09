@props([
    'userMenu' => [],
])

<ul class="header-nav ms-3">
    <li class="nav-item dropdown">

        <!-- UserAvatar -->
        <a class="nav-link py-0" data-coreui-toggle="dropdown"
           href="#" role="button"
           aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-md">
                <img class="avatar-img" src="{{ $userMenu['avatar'] }}" alt="{{ $userMenu['email'] }}"/>
            </div>
        </a>

        <!-- DropdownMenu -->
        <div class="dropdown-menu dropdown-menu-end pt-0">

            @foreach ($userMenu['dropdown'] as $dropdown)
                @if (isset($dropdown['group']))
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">{{ $dropdown['group'] }}</div>
                    </div>
                    @foreach ($dropdown['items'] as $item)
                        <a class="dropdown-item" href="{{ $item['route'] }}">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#{{ $item['icon'] }}"/>
                            </svg> {{ $item['name'] }}
                        </a>
                    @endforeach
                @endif
            @endforeach

            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button class="btn btn-link dropdown-item" type="submit">
                    <svg class="icon me-2">
                        <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-account-logout"/>
                    </svg> Logout
                </button>
            </form>

        </div>
    </li>
</ul>

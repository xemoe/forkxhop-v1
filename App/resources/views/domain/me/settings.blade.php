<x-dashboard-layout :breadcrumb="$breadcrumb">

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('me.user.profile') }}">My Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('me.user.settings') }}">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('me.user.password') }}">Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Notifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Activities</a>
        </li>
    </ul>

    <div class="container-fluid p-0 pt-4">
        <div class="row">
            <div class="col-md-6">
                @include('domain.me._user.cards_user_settings')
            </div>
        </div>
    </div>

</x-dashboard-layout>
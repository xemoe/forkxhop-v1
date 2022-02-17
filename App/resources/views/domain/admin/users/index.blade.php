<x-dashboard-layout :breadcrumb="$breadcrumb">

    @php
        $rolesBadge = [
            'root' => 'bg-primary',
            'admin' => 'bg-success',
            'simple' => 'bg-light text-dark',
        ];
    @endphp

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @elseif ($message = Session::get('failed'))
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="container-fluid p-0">
        <div class="card mb-4">

            <!-- card header -->
            <div class="card-header">
                <strong>User Management</strong><span class="small ms-1 text-medium-emphasis">(total {{ $users->count() }} users)</span>
            </div>

            <!-- card body -->
            <div class="card-body p-3">
                <div class="d-flex bd-highlight">
                    <div class="p-0 flex-grow-1 bd-highlight">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-shadow bg-primary mb-3">
                            Create New User
                        </a>
                    </div>
                    <div class="p-0 bd-highlight">
                        <div class="dropdown">
                            <a class="btn btn-ghost-primary dropdown-toggle" id="dropdownMenuLink" href="#"
                               role="button" data-coreui-toggle="dropdown" aria-expanded="false">Sort</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach ($sortOptions as $item)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.users.index', $item) }}">
                                            {{ $item['order'] }} ({{ $item['sort'] }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th scope="col" colspan="2"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="p-0 align-middle text-center">
                                    <a href="{{ route('admin.users.show', ['user' => $user]) }}">
                                        <svg class="icon icon-sm">
                                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-search"/>
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-0 align-middle text-center">
                                    <a href="{{ route('admin.users.edit', ['user' => $user]) }}">
                                        <svg class="icon icon-sm">
                                            <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-pen"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge rounded-pill {{ $rolesBadge[$v] ?? '' }}">
                                                {{ $v }}
                                            </label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- card footer -->
            <div class="card-footer">
                {!! $users->render() !!}
            </div>

        </div>
    </div>

</x-dashboard-layout>

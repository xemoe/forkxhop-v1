<x-dashboard-layout
    :menuSettings="$menuSettings"
    :headerSettings="$headerSettings"
    :breadcrumb="$breadcrumb">

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
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
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-shadow mb-3">Create new
                            user</a>
                    </div>
                    <div class="p-0 bd-highlight">
                        <div class="dropdown">
                            <a class="btn btn-ghost-primary dropdown-toggle" id="dropdownMenuLink" href="#"
                               role="button" data-coreui-toggle="dropdown" aria-expanded="false">Sort</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">ID (Desc)</a></li>
                                <li><a class="dropdown-item" href="#">Email (Desc)</a></li>
                                <li><a class="dropdown-item" href="#">Name (Desc)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 48px;"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Updated</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                        $rolesBadge = [
                            'root' => 'bg-primary',
                            'admin' => 'bg-success',
                            'simple' => 'bg-light text-dark',
                        ];
                        @endphp

                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">
                                    <a href="#edit/{{ $user->id }}">
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
                                            <label class="badge rounded-pill {{ $rolesBadge[$v] ?? '' }}">{{ $v }}</label>
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

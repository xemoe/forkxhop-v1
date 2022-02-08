<x-dashboard-layout
    :menuSettings="$menuSettings"
    :headerSettings="$headerSettings"
    :breadcrumb="$breadcrumb">

    <div class="container-fluid p-0">
        <div class="card mb-4">

            <!-- card header -->
            <div class="card-header">
                <strong>User Management</strong><span class="small ms-1 text-medium-emphasis">(total 2 users)</span>
            </div>

            <!-- card body -->
            <div class="card-body p-3">
                <div class="d-flex bd-highlight">
                    <div class="p-0 flex-grow-1 bd-highlight">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create new user</a>
                    </div>
                    <div class="p-0 bd-highlight">
                        <div class="dropdown">
                            <a class="btn btn-ghost-primary dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-coreui-toggle="dropdown" aria-expanded="false">Sort</a>
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
                        <tr>
                            <td class="text-center">
                                <a href="#edit/1">
                                    <svg class="icon icon-sm">
                                        <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-pen"/>
                                    </svg>
                                </a>
                            </td>
                            <td>Mark</td>
                            <td>otto@example.com</td>
                            <td>simple</td>
                            <td>{{ \Carbon\Carbon::parse("-2 hours") }}</td>

                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="#edit/2">
                                    <svg class="icon icon-sm">
                                        <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-pen"/>
                                    </svg>
                                </a>
                            </td>
                            <td>Jacob</td>
                            <td>thornton@example.com</td>
                            <td>simple</td>
                            <td>{{ \Carbon\Carbon::parse("-1 hours 15 min") }}</td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- card footer -->
            <div class="card-footer">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>

</x-dashboard-layout>

<x-dashboard-layout :breadcrumb="$breadcrumb">

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>User Information</strong>
                    </div>

                    @php
                        $rolesBadge = [
                            'root' => 'bg-primary',
                            'admin' => 'bg-success',
                            'simple' => 'bg-light text-dark',
                        ];
                    @endphp

                    <div class="card-body p-3">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control bg-light border-0" value="{{ $user->name }}"
                                       readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control bg-light border-0" value="{{ $user->email }}"
                                       readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Roles</label>
                            <div class="col-sm-10 align-middle">
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label
                                            class="mt-2 badge rounded-pill {{ $rolesBadge[$v] ?? '' }}">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-switch mt-2">
                                    <input
                                        class="form-check-input {{ $user->active ? 'bg-success border-success' : 'bg-secondary border-dark' }}"
                                        type="checkbox"
                                        role="switch" id="flexSwitchCheckChecked"
                                        disabled {{ $user->active ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                           for="flexSwitchCheckChecked">User {{ $user->active ? 'activated.' : 'deactivated.' }}</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @if (view()->exists('domain.admin.users.activities'))
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>User Activities</strong>
                        </div>
                        <div class="card-body p-3">
                            <!-- @TODO add users activities table -->
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

</x-dashboard-layout>

<x-dashboard-layout :breadcrumb="$breadcrumb">

    @php
        $defaultRole = 'simple';
    @endphp

    <div class="container-lg p-0">
        <x-dashboard.cards.validation-errors class="callout callout-danger bg-white" :errors="$errors"/>
        <div class="card mb-4">
            <form method="POST" class="needs-validation" action="{{ route('admin.users.store') }}" novalidate>
                @csrf
                <div class="card-header">
                    <strong>Create New User</strong>
                </div>

                <div class="card-body p-3">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputName">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                                   minlength="3" maxlength="255"
                                   type="text" placeholder="Name" value="{{ old('name') }}" required>
                            <small class="form-text text-muted">
                                {{ $errors->first('name') }}
                            </small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputEmail">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                                   name="email"
                                   type="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                            <small class="form-text text-muted">
                                {{ $errors->first('email') }}
                            </small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="inputPassword">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                   name="password"
                                   minlength="8" maxlength="255"
                                   type="password" required>
                            <small class="form-text text-muted">
                                {{ $errors->first('password') }}
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="inputConfirmPassword">Confirm Password</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                   id="inputConfirmPassword" name="password_confirmation"
                                   minlength="8" maxlength="255"
                                   type="password" required>
                            <small class="form-text text-muted">
                                {{ $errors->first('password_confirmation') }}
                            </small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputSelectRole">Role</label>
                            <select class="form-select" id="inputSelectRole" size="4" name="role">
                                @foreach ($roleOptions as $role)
                                    <option value="{{ $role }}"
                                            class="text-capitalize" {{ $defaultRole == $role ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputSelectRole">Active</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="active"
                                       role="switch" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Activated this user</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <div class="col-12">
                        <button class="btn btn-primary bg-primary btn-shadow" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript">
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</x-dashboard-layout>

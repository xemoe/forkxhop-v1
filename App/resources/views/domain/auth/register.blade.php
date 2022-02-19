<x-auth-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Register form card -->
                <div class="card mb-4 mx-4">
                    <div class="card-body p-4">
                        <h1 class="card-title">{{ __('Register') }}</h1>
                        <p class="card-text">Create your account</p>
                        <form method="POST" class="needs-validation" action="{{ route('guest.register.store') }}" novalidate>
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-user'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control" type="text" name="name"
                                       placeholder="{{ __('Name') }}"
                                       value="{{ old('name') }}"
                                       minlength="3" maxlength="255"
                                       required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-envelope-open'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control" type="email" name="email"
                                       placeholder="{{ __('E-Mail Address') }}"
                                       value="{{ old('email') }}"
                                       required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-lock-locked'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control" type="password" name="password"
                                       placeholder="{{ __('Password') }}"
                                       minlength="8" maxlength="255"
                                       required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-lock-locked'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control" type="password" name="password_confirmation"
                                       placeholder="{{ __('Confirm Password') }}"
                                       minlength="8" maxlength="255"
                                       required>
                            </div>
                            <button class="btn btn-block btn-primary btn-shadow" type="submit">{{ __('Register') }}</button>
                            <x-auth.validation-errors class="callout callout-danger" :errors="$errors" />
                        </form>
                    </div>
                </div>

            </div>
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
</x-auth-layout>

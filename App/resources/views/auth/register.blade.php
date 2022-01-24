<x-auth-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Register form card -->
                <div class="card mb-4 mx-4">
                    <div class="card-body p-4">
                        <h1 class="card-title">{{ __('Register') }}</h1>
                        <p class="card-text">Create your account</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon"><use xlink:href="icons/sprites/free.svg#cil-user"></use></svg>
                                </span>
                                <input class="form-control" type="text" name="name"
                                       placeholder="{{ __('Name') }}"
                                       value="{{ old('name') }}"
                                       required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon"><use xlink:href="icons/sprites/free.svg#cil-envelope-open"></use></svg>
                                </span>
                                <input class="form-control" type="email" name="email"
                                       placeholder="{{ __('E-Mail Address') }}"
                                       value="{{ old('email') }}"
                                       require>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon"><use xlink:href="icons/sprites/free.svg#cil-lock-locked"></use></svg>
                                </span>
                                <input class="form-control" type="password" name="password"
                                       placeholder="{{ __('Password') }}"
                                       required>
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <svg class="icon"><use xlink:href="icons/sprites/free.svg#cil-lock-locked"></use></svg>
                                </span>
                                <input class="form-control" type="password" name="password_confirmation"
                                       placeholder="{{ __('Confirm Password') }}"
                                       required>
                            </div>
                            <button class="btn btn-block btn-primary btn-shadow" type="submit">{{ __('Register') }}</button>
                            <x-auth-validation-errors class="callout callout-danger" :errors="$errors" />
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-auth-layout>

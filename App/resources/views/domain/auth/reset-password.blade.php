<x-auth-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4 mx-4">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-envelope-open'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                       placeholder="{{ __('E-Mail Address') }}"
                                       value="{{ old('email', $request->email) }}"
                                       required autocomplete="email" autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-lock-locked'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control" type="password" name="password"
                                       placeholder="{{ __('Password') }}"
                                       required>
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-lock-locked'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control" type="password" name="password_confirmation"
                                       placeholder="{{ __('Confirm Password') }}"
                                       required>
                            </div>
                            <button class="btn btn-block btn-primary btn-shadow" type="submit">{{  __('Reset Password') }}</button>
                            <x-auth.validation-errors class="callout callout-danger" :errors="$errors" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>

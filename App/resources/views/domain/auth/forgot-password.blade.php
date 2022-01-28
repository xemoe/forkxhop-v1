<x-auth-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4 mx-4">
                    <h5 class="card-header">{{ __('Reset Password') }}</h5>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <x-auth.svg-icon :icon="'cil-envelope-open'"></x-auth.svg-icon>
                                </span>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                       placeholder="{{ __('E-Mail Address') }}"
                                       value="{{ old('email') }}"
                                       required autocomplete="email" autofocus>
                            </div>
                            <button class="btn btn-block btn-primary btn-shadow" type="submit">{{ __('Send Password Reset Link') }}</button>
                            <x-auth.validation-errors class="callout callout-danger" :errors="$errors" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>

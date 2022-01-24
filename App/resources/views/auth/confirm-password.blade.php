<x-auth-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card mb-4 mx-4">
                    <div class="card-header">{{ __('Confirm Password') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="text-medium-emphasis">{!! __('This is a secure area of the application. <br/>Please confirm your password before continuing.') !!}</p>
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon"><use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-lock-locked"></use></svg>
                                </span>
                                <input class="form-control" type="password" name="password"
                                       placeholder="{{ __('Current Password') }}"
                                       required>
                            </div>
                            <button class="btn btn-block btn-primary btn-shadow" type="submit">{{  __('Confirm') }}</button>
                            <x-auth-validation-errors class="callout callout-danger" :errors="$errors" />
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-auth-layout>

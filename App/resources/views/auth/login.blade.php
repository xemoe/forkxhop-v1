<x-auth-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-group d-block d-md-flex row">

                    <!-- SignIn form card -->
                    <div class="card col-md-7 p-4 mb-0">
                        <div class="card-body">
                            <h1 class="card-title">Login</h1>
                            <p class="card-text">Sign In to your account</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                      <svg class="icon"><use xlink:href="icons/sprites/free.svg#cil-user"></use></svg>
                                    </span>
                                    <input class="form-control" type="email" name="email"
                                           placeholder="{{ __('E-Mail Address') }}"
                                           value="{{ old('email') }}"
                                           required autofocus>
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">
                                      <svg class="icon"><use xlink:href="icons/sprites/free.svg#cil-lock-locked"></use></svg>
                                    </span>
                                    <input class="form-control" type="password" name="password"
                                           placeholder="{{ __('Password') }}"
                                           required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4 btn-shadow" type="submit">{{ __('Login') }}</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="{{ route('password.request') }}" class="btn btn-link px-0" type="button">{{ __('Forgot Your Password?') }}</a>
                                    </div>
                                </div>
                                <x-auth-validation-errors class="callout callout-danger" :errors="$errors" />
                            </form>
                        </div>
                    </div>

                    <!-- SignUp link card -->
                    <div class="card col-md-5 text-white bg-primary py-5">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('register') }}" class="btn btn-lg btn-outline-light mt-3">{{ __('Register') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-auth-layout>

@extends('layouts.app')

@section('content')
    <div class="m-auto max-w-sm md:max-w-lg  mt-20">
        <div class="text-4xl mb-8">{{ __('Log In') }}</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-5">
                <label for="email" class="mb-2">{{ __('Email') }}</label>

                <div class="">
                    <input class="bg-slate-100 w-full h-10 rounded-md px-2 py-1" id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <script>
                function TogglePassword() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <div class="">
                <label for="password" class="">{{ __('Password') }}</label>

                <div class="relative">
                    <input class="bg-slate-100 w-full h-10 rounded-md px-2 py-1" id="password" type="password"
                        name="password" required autocomplete="current-password">
                    <img src="/images/password.png" class="right-1 top-1.5 absolute w-7" onclick="TogglePassword()">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-5">
                <div class="">
                    <div class="mt-2">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="flex flex-col">
                    <button type="submit"
                        class="py-1 px-4 w-full py-2 rounded-md mb-3 text-white bg-blue-500 hover:bg-blue-700">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection

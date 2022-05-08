@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-5 mx-auto rounded-0 border-0" style="max-width: 400px; background-color: #1ABC9C; border-radius: 10px !important;">
                <div class="card-body pb-2" style="padding: 40px;">
                    <form id="login-form" name="login-form" class="mb-0" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-white text-center">Login to your Account</h3>
                        <div class="row p-3 pb-0">
                            <div class="col-12 form-group">
                                <label class="text-white" for="login-form-username">Email:</label>
                                <input id="email" id="login-form-username" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 form-group">
                                <label class="text-white" for="login-form-password">Password:</label>
                                <input id="password" type="password" class="form-control @error('password')
                                    is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-12 mt-3 text-center">
                                        <button type="submit" class="button button-3d button-black m-0"
                                                id="login-form-submit">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <div class="col-md-12 mt-3 text-center">
                                        @if (Route::has('password.request'))
                                            <a class="btn text-white btn-link text-decoration-none" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
{{--                    <div class="line line-sm"></div>--}}
{{--                    <div class="w-100 text-center">--}}
{{--                        <h4 style="margin-bottom: 15px;">or Login with:</h4>--}}
{{--                        <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>--}}
{{--                        <span class="d-none d-md-inline-block">or</span>--}}
{{--                        <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

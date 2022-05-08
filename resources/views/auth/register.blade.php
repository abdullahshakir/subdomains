@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3 mx-auto rounded-0 border-0" style="max-width: 400px; background-color: #1ABC9C; border-radius: 10px !important;">
                <div class="card-body pb-2" style="padding: 40px;padding-left: 50px;padding-right: 50px;">
                <h3 class="text-white text-center">{{ __('Register') }}</h3>
                    <form id="login-form" name="login-form" class="" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-12 pl-2 pr-2 form-group">
                                <label class="text-white" for="login-form-username">Name:</label>
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name"
                                       autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-12 form-group">
                                <label class="text-white" for="login-form-username">Email address:</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-12 form-group">
                                <label class="text-white" for="login-form-username">Password:</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-12 form-group">
                                <label class="text-white" for="password-confirm">Confirm Password:</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 text-center mt-1">
                                <button type="submit" class="button button-3d button-black m-0"
                                        id="login-form-submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-5 mt-3 mx-auto rounded-0 border-0" style="max-width: 400px; background-color: #1ABC9C; border-radius: 10px !important;">
                <div class="card-body pb-2" style="padding: 40px;padding-left: 50px;padding-right: 50px;">
                    <h3 class="text-white text-center">{{ __('Reset Password') }}</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="login-form" name="login-form" class="" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row mt-4 mb-3">
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
                        <div class="row mb-0">
                            <div class="col-md-12 text-center mt-1">
                                <button type="submit" class="button button-3d button-black m-0"
                                        id="login-form-submit">
                                    {{ __('Send Password Reset Link') }}
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

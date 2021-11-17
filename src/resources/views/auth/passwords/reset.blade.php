@extends('layouts.logintemplate')

@section('content')
<div class="login-main">
    <div class="login-triangle">
    </div>
        <h2 class="login-header">{{ __('Reset Password') }}</h2>
            <form method="POST" action="{{ route('password.update') }}" class="login-container">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email">{{ __('E-Mail') }}</label>
                    <p>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <p>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <p>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </p>
                </div>
                    <p>
                        <input type="submit" value="Reset Password">
                    </p>
                </div>
            </form>
</div>
@endsection

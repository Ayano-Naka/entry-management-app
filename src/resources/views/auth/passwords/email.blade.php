@extends('layouts.logintemplate')

@section('content')

<div class="login-main">
    <div class="login-triangle">
    </div>
        <h2 class="login-header">Reset Password</h2>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" class="login-container" action="{{ route('password.email') }}">
            @csrf
                <p>
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </p>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <p>
                    <input type="submit" value="Send Password Reset Link">
                </p>
            </form>
        </div>
</div>
@endsection
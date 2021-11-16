@extends('layouts.logintemplate')

@section('content')
<div class="home-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="home-wrapper">
                    <div class="home-title">
                        {{ __('メールアドレスを認証してください') }}
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('新規の認証リンクを再度送信しました') }}
                            </div>
                        @endif
                    </div>
                    <p>
                        {{ __('送信メール内の認証リンクから認証を行ってください。') }}
                        {{ __('メールが届いていない場合は') }}、
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                            <button type="submit">{{ __('こちらをクリックで再度メール送信します。') }}</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
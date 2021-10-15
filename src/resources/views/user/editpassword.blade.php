@extends('layouts.template')

@section('content')


<div class="setting-title">
    パスワードを変更する
</div>

{{-- エラーメッセージ --}}
@if(count($errors) > 0)
<div class="container mt-2">
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
</div>
@endif

{{-- 更新成功メッセージ --}}
@if (session('update_password_success'))
<div class="container mt-2">
    <div class="alert alert-success">
        {{session('update_password_success')}}
    </div>
</div>
@endif

<form action="{{route('user.password.update')}}" method="post">
    @csrf
    <div class="setting-wrapper">
        <label for="current">現在のパスワード</label>
            <div class="text2-wrapper">
                <input id="current" type="password" name="current-password" required autofocus>
            </div>
    </div>
    <div class="setting-wrapper">
        <label for="password">新しいパスワード</label>
            <div class="text2-wrapper">
                <input id="password" type="password" name="new-password" required>
            </div>
    </div>
    <div class="setting-wrapper">
        <label for="confirm">新しいパスワード(確認用)</label>
            <div class="text2-wrapper">
                <input id="confirm" type="password" name="new-password_confirmation"required>
            </div>
    </div>
    <div class="submit-wrapper" style="margin:3rem 5rem 3rem 3rem;">
        <button class="submit-btn">
            <span class="nomal">submit</span>
            <span class="hover">送信</span>
        </button>
    </div>
</form>

@endsection
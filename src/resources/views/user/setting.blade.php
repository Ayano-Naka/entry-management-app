@extends('layouts.template')

@section('content')


<div class="setting-title">
    アカウント設定
</div>

<form action="{{ action('Admin\UserController@update') }}" method="POST">
    <div class="setting-wrapper">
        <label><a href=""><img class="icon" src="/images/profile_icon.png" alt=""></a></label>
            <div class="text-wrapper">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" style="width: 48%;">
            </div>
    </div>  
    <div class="setting-wrapper">
        <label>メールアドレス</label>
            <div class="text2-wrapper">
                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>
    </div>
        <div class="settingpass">
            <a href="{{route('user.password.edit')}}">パスワードの変更はこちらから</a>
        </div>
    <div class="submit-wrapper" style="margin:3rem 5rem 3rem 3rem;">
        <button type="submit" class="submit-btn">
            <span class="nomal">submit</span>
            <span class="hover">送信</span>
        </button>
        {{ csrf_field() }}
    </div>
</form>

@endsection
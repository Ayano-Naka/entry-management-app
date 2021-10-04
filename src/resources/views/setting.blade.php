@extends('layouts.template')

@section('content')


<div class="setting-title">
    アカウント設定
</div>

<form action="" method="">
    <div class="setting-wrapper">
        <label><a href=""><img class="icon" src="/images/profile_icon.png" alt=""></a></label>
            <div class="text-wrapper">
                <input type="text" name="name" value="登録している名前" style="width: 48%;">
            </div>
    </div>  
    <div class="setting-wrapper">
        <label>メールアドレス</label>
            <div class="text2-wrapper">
                <input type="text" name="mail" value="登録しているアドレス">
            </div>
    </div>
    <div class="setting-wrapper">
        <label>パスワード</label>
            <div class="text2-wrapper">
                <input type="password" name="password">
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
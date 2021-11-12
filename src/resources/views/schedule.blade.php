@extends('layouts.template')

@section('content')
<!-- title -->
<div class="title">
    <h1>予定を追加</h1>
</div>

<div class="add-wrapper">
<form action="{{ url('/schedule')}}" method="POST">
    @csrf
    <table>  
        <tr>
            <td class="item">件名</td>
            <td>
            <div class="text-box">
                <input type="text" name="summary">
            </div>
            </td>
        </tr>
        <tr>
            <td class="item">日時</td>
            <td><input name="start" type="datetime-local"> - <input name="end" type="datetime-local">
            </td>
        </tr>
        <tr>
            <td class="item">場所</td>
            <td>
            <div class="text-box">
                <input type="text" name="location">
            </div>
            </td>
        </tr>
        <tr>
            <td class="item">メモ</td>
            <td>
            <div class="memo-box">    
            <textarea name="description" placeholder="メモを入力"></textarea>
            </div>
            </td>
        </tr>
    </table>
    <div class="submit-wrapper">
        <button class="submit-btn">
            <span class="nomal">submit</span>
            <span class="hover">送信</span>
        </button>
    </div>
</form>
</div>

@endsection
@extends('layouts.template')

@section('content')

<!-- title -->
<div class="title">
    <h1>新規登録</h1>
</div>

<!-- add to list -->
<div class="add-wrapper">
    <form action="{{ url('/post')}}" method="POST">
    @csrf
    <table>
        <tr>
            <td class="item">会社名</td>
            <td>
                <div class="text-box">
                    <input type="text" name="company" id="company">
                </div>
                @error('company')
                    <p class="error-item">{{ $message }}</p>
                @enderror
            </td>
        </tr>
        <tr>
            <td class="item">住所</td>
            <td>
                <div class="pull-down">
                    <select name="pref_id"　id="pref_id" type="text" class="form-control"> 
                        @foreach($prefs as $key => $score)
                            <option value="" disabled selected hidden>都道府県</option>  
                            <option value="{{ $key }}">{{ $score }}</option>
                        @endforeach
                    </select>
                </div>
                @error('pref_id')
                    <p class="error-item">{{ $message }}</p>
                @enderror
                <div class="text-box">
                    <input type="text" name="city" placeholder="市町村・番地">
                </div>
                @error('city')
                    <p class="error-item">{{ $message }}</p>
                @enderror
            </td>
        </tr>
        <tr>
            <td class="item">選考状況</td>
            <td>
                <div class="pull-down">
                <select name="stage_id" id="stage_id" type="text">
                    @foreach($stages as $index => $name)
                        <option value="{{ $index }}">{{ $name }}</option>
                    @endforeach
                </select>
                </div>
            </td>
        </tr>
        <tr>
            <td class="item">職種</td>
            <td>
                <div class="text-box">
                    <input type="text" name="job">
                </div>
                @error('job')
                    <p class="error-item">{{ $message }}</p>
                @enderror
            </td>
        </tr>
        <tr>
            <td class="item">面接予定日時</td>
            <td class="date-time">
                <input type="date" name="limit" max="9999-12-31">
            </td>
        </tr>
        <tr>
            <td class="item">担当者</td>
            <td>
                <div class="text-box">
                    <input type="text" name="officer">
                </div>
                @error('officer')
                    <p class="error-item">{{ $message }}</p>
                @enderror
            </td>
        </tr>
        <tr>
            <td class="item">メモ</td>
            <td>
                <div class="memo-box">    
                    <textarea name="memo" placeholder="メモを入力"></textarea>
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
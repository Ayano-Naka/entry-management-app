@extends('layouts.template')
@section('content')

<div class="title">
<h1>基本情報編集</h1>
</div>

<div class="add-wrapper">
    <form action="{{ route('posts.edit',['id' => $post->id]) }}" method="POST">
        @csrf
        <table>
            <tr>
                <td class="item">会社名</td>
                <td>
                    <div class="text-box">
                        <input type="text" name="company" id="company" value="{{ $post->company }}">
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
                        <select name="pref_id"　id="pref_id" class="form-control"> 
                            @foreach(config('pref') as $key => $score)
                                <option
                                    value="{{ $key }}"
                                    {{ $key == old('pref_id', $post->pref_id) ? 'selected' : '' }}
                                    >{{ $score }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-box">
                        <input type="text" name="city" value="{{ $post->city }}" placeholder="市町村・番地">
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
                        <select name="stage_id"　id="stage_id" class="form-control"> 
                            @foreach(config('stage') as $index => $name)
                                <option
                                    value="{{ $index }}"
                                    {{ $index == old('stage_id', $post->stage_id) ? 'selected' : '' }}
                                    >{{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="item">職種</td>
                <td>
                    <div class="text-box">
                        <input type="text" name="job" value="{{ $post->job }}">
                    </div>
                    @error('job')
                        <p class="error-item">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td class="item">面接予定日時</td>
                <td class="date-time">
                    <input type="date" name="limit" value="{{ $post->limit }}" max="9999-12-31">
                </td>
            </tr>
            <tr>
                <td class="item">担当者</td>
                <td>
                    <div class="text-box">
                        <input type="text" name="officer" value="{{ $post->officer }}">
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
                        <textarea name="memo" placeholder="メモを入力">{{ $post->memo }}</textarea>
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
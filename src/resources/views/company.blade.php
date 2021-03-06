@extends('layouts.template')

@section('content')
<!-- title -->
<div class="title">
    <h1>基本情報</h1>
</div>

<!-- detail -->
<div class="add-wrapper">
<table>
        <tr>
            <td class="item">会社名</td>
            <td>{{ $post->company }}</td>
        </tr>
        <tr>
            <td class="item">住所</td>
            <td>{{ $post->PrefName }}{{ $post->city }}</td>
        </tr>
        <tr>
            <td class="item">選考状況</td>
            <td>{{ $post->StageName }}</td>
        </tr>
        <tr>
            <td class="item">職種</td>
            <td>{{ $post->job }}</td>
        </tr>
        <tr>
            <td class="item">面接予定日時</td>
            <td>{{ $post->limit }}
                @if($post->limit == null)
                未定
                @endif
            </td>
        </tr>
        <tr>
            <td class="item">担当者</td>
            <td>{{ $post->officer }}</td>
        </tr>
        <tr>
            <td class="item">メモ</td>
            <td>{{ $post->memo }}</td>
        </tr>
</table>
</div>

    <div class="buttons">
        <span class="edit"><a href="/postedit/{{$post->id}}">編集</a></span>
        <span class="delete"><a href="/postdel/{{$post->id}}">削除</a></span>
    </div>


@endsection
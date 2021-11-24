@extends('layouts.template')

@section('content')


<form action="/postdel/{{$post->id}}" method="POST">
@csrf
    <div class="buttons">
    下記会社情報を削除しますか？
        <input type="submit" name="delete" value="削除">
        <span class="cancel"><a href="/company/{{$post->id}}">キャンセル</a></span>
    </div>
</form>



    <!-- detail  -->
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

@endsection
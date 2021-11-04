@extends('layouts.template')

@section('content')

<!-- title -->
<div class="title">
    <h1>検索結果</h1>
</div>

<!-- list -->
<section id="latest-list">
    <p>全{{$posts->count()}}件</p>
    <table>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->limit }}</td><td>{{ $post->prefName }}</td><td>{{ $post->company }}</td><td>{{ $post->StageName }}</td><td>{{ $post->job }}</td><td>{{ $post->officer }}</td><td><a href="{{ action('PostController@show', $post->id) }}">詳細</a></td>
        </tr>
    @endforeach
    </table>
    <div class="paging">
        {{ $posts->appends(request()->input())->links() }}
    </div>
</section>



@endsection
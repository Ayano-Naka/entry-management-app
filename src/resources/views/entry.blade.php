@extends('layouts.template')
@section('content')

    <!-- main -->
    <div class="main-visual">
        <section class="shapes-group">
            @foreach($first as $one)
            <div class="tags"><p class="text">エントリー中</p>{{$one->count_stageId}}件</div>
            @endforeach

            @if(count($first) <= 0)
            <div class="tags"><p class="text">エントリー中</p>0件</div>
            @endif

            @foreach($second as $two)
            <div class="tags"><p class="text">書類選考中</p>{{$two->count_stageId}}件</div>
            @endforeach

            @if(count($second) <= 0)
            <div class="tags"><p class="text">書類選考中</p>0件</div>
            @endif

            @foreach($third as $three)
            <div class="tags"><p class="text">一次選考中</p>{{$three->count_stageId}}件</div>
            @endforeach

            @if(count($third) <= 0)
            <div class="tags"><p class="text">一次選考中</p>0件</div>
            @endif

            @foreach($fourth as $four)
            <div class="tags"><p class="text">二次選考中</p>{{$four->count_stageId}}件</div>
            @endforeach

            @if(count($fourth) <= 0)
            <div class="tags"><p class="text">二次選考中</p>0件</div>
            @endif

            @foreach($fifth as $five)
            <div class="box"><p class="text">内定</p>{{$five->count_stageId}}件</div>
            @endforeach

            @if(count($fifth) <= 0)
            <div class="box"><p class="text">内定</p>0件</div>
            @endif
        </section>
    </div>
    <!--search -->
    <div class="search-wrapper">
        <form action="{{route('posts.search')}}" method="GET">
        @csrf
            <div class="pull-down">
                <select name="pref_id"　id="pref_id" type="text" class="form-control"> 
                    @foreach($prefs as $key => $score)
                        <option value="" disabled selected hidden>都道府県</option>  
                        <option value="{{ $key }}">{{ $score }}</option>
                    @endforeach
                </select>
            </div>
            <p class="search-parts">×</p>
            <div class="pull-down">
                <select name="stage_id" id="stage_id" type="text">
                    @foreach($stages as $index => $name)
                        <option value="" disabled selected hidden>選考状況</option> 
                        <option value="{{ $index }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <p class="search-parts">×</p>
            <div class="search-box">
                    <input type="search" name="keyword" placeholder="キーワードを入力">
            </div>
            <p class="search-parts">
                <button type="submit">
                    <i class="material-icons">search</i>
                </button>
            </p>
        </form>
    </div>
    <!-- latest list -->
    <section id="latest-list">
        <div class="button-wrapper">
            <a href="/post"><i class="material-icons">add_circle_outline</i></a>
        </div>
        <p>全{{$posts->total()}}件</p>
        <table>
        <tr>
                <td>面接予定日</td>
                <td>住所</td>
                <td>会社名</td>
                <td>選考状況</td>
                <td>職種</td>
                <td>担当者</td>
                <td>詳細ページ</td>
        </tr>
            @foreach($posts as $post)
        <tr>
            <td>{{ $post->limit }}
                    @if($post->limit == null)
                    未定
                    @endif
            </td>
            <td>{{ $post->prefName }}</td>
            <td>{{ $post->company }}</td>
            <td>{{ $post->StageName }}</td>
            <td>{{ $post->job }}</td>
            <td>{{ $post->officer }}</td>
            <td><a href="{{ action('PostController@show', $post->id) }}">詳細</a></td>
        </tr>
            @endforeach
        </table>
            <div class="paging">
            {{ $posts->appends(request()->input())->links() }}
            </div>
    </section>
    
@endsection
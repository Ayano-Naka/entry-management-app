@extends('layouts.template')
@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

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
<div id="post_top">
<!--search -->
    <div class="search-wrapper">
        <p class="search-parts">
            <i class="material-icons">search</i>
        </p>
            <div class="pull-down">
                <select name="pref_id"　id="pref_id" v-model="area_search"> 
                    <option value="0" disabled selected hidden>都道府県</option>
                    <option v-for="(pref,index) in prefs" :value="index">@{{ pref }}</option>
                </select>
            </div>
        <p class="search-parts">×</p>
        <div class="pull-down">
            <select name="stage_id" id="stage_id" v-model="stage_search">
                <option value="0" disabled selected hidden>選考状況</option> 
                <option v-for="(stage,index) in stages" :value="index">@{{ stage }}</option>
            </select>
        </div>
        <p class="search-parts">×</p>
        <div class="search-box">
            <input v-model="searchQuery" placeholder="キーワードを入力">
        </div>
    </div>
    <!-- latest list -->
    <section id="latest-list">
            <div class="button-wrapper">
                <a href="/post"><i class="material-icons">add_circle_outline</i></a>
            </div>
            <p>全何件</p>
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
                <tr v-for="post in searchIndicator" v-bind:key="post.id">
                    <td v-if="post.limit">@{{post.limit}}</td>
                    <td v-else>未定</td>
                    <td>@{{post.prefName}}</td>
                    <td>@{{post.company}}</td>
                    <td>@{{post.stageName}}</td>
                    <td>@{{post.job }}</td>
                    <td>@{{post.officer}}</td>
                    <td><a :href="`/company/${post.id}`">詳細</a></td>
                </tr>
            </table>
    </section>
</div>

<script src="{{ asset('js/post.js') }}"></script>

    
@endsection

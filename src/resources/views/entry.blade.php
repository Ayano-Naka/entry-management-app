@extends('layouts.template')
@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<!-- main -->
<div id="post_top">
<div class="main-visual">
    <section class="shapes-group">
        <div class="tags"><p class="text">エントリー中</p>@{{countOne.length}}件</div>

        <div class="tags"><p class="text">書類選考中</p>@{{countTwo.length}}件</div>

        <div class="tags"><p class="text">一次選考中</p>@{{countThree.length}}件</div>

        <div class="tags"><p class="text">二次選考中</p>@{{countFour.length}}件</div>

        <div class="box"><p class="text">内定</p>@{{countFive.length}}件</div>

    </section>
</div>
<!--search -->
    <div class="search-wrapper">
        <p class="search-parts">
            <i class="material-icons">search</i>
        </p>
            <div class="pull-down">
                <select name="pref_id"　id="pref_id" v-model="area_search" @change="area_select(area_search)"> 
                    <option value="0" disabled selected hidden>都道府県</option>
                    <option v-for="(pref,index) in prefs" :value="index">@{{ pref }}</option>
                </select>
            </div>
        <p class="search-parts">×</p>
        <div class="pull-down">
            <select name="stage_id" id="stage_id" v-model="stage_search" @change="stage_select(stage_search)">
                <option value="0" disabled selected hidden>選考状況</option> 
                <option v-for="(stage,index) in stages" :value="index">@{{ stage }}</option>
            </select>
        </div>
        <p class="search-parts">×</p>
        <div class="search-box">
            <input v-model="searchQuery" placeholder="キーワードを入力" @input="keyword_search(searchQuery)">
        </div>
    </div>
    <!-- latest list -->
    <section id="latest-list">
            <div class="button-wrapper">
                <a href="/post"><i class="material-icons">add_circle_outline</i></a>
            </div>
                <p>全 @{{total}} 件中 @{{from}} 〜 @{{to}} 件表示</p>
                <div class="paging">
                    <ul class="pagination">
                        <li :class="{disabled: current_page <= 1}"><a href="#" @click="change(1)">&laquo;</a></li>
                        <li :class="{disabled: current_page <= 1}"><a href="#" @click="change(current_page - 1)">&lt;</a></li>
                        <li v-for="page in pages" :key="page" :class="{active: page === current_page}">
                            <a href="#" @click="change(page)">@{{page}}</a>
                        </li>
                        <li :class="{disabled: current_page >= last_page}"><a href="#" @click="change(current_page + 1)">&gt;</a></li>
                        <li :class="{disabled: current_page >= last_page}"><a href="#" @click="change(last_page)">&raquo;</a></li>
                    </ul>
                </div>
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
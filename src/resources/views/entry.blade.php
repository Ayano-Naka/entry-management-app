@extends('layouts.template')
@section('content')
    <!-- main -->
    <div class="main-visual">
        <section class="shapes-group">
            <div class="tags"><p class="text">エントリー中</p>5件</div>
            <div class="tags"><p class="text">書類選考中</p>5件</div>
            <div class="tags"><p class="text">一次選考中</p>5件</div>
            <div class="tags"><p class="text">二次選考中</p>5件</div>
            <div class="box"><p class="text">内定</p>5件</div>
        </section>
    </div>
    <!--search -->
    <div class="search-wrapper">
        <div class="pull-down">
        <form action="" method="">
            <select name="prefectures">
                <option value=""hidden>エリアを選択</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="茨城県">茨城県</option>
                <option value="栃木県">栃木県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="千葉県">千葉県</option>
                <option value="東京都">東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="福井県">福井県</option>
                <option value="山梨県">山梨県</option>
                <option value="長野県">長野県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="静岡県">静岡県</option>
                <option value="愛知県">愛知県</option>
                <option value="三重県">三重県</option>
                <option value="滋賀県">滋賀県</option>
                <option value="京都府">京都府</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">広島県</option>
                <option value="山口県">山口県</option>
                <option value="徳島県">徳島県</option>
                <option value="香川県">香川県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="熊本県">熊本県</option>
                <option value="大分県">大分県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
            </select>
        </div>
        <p class="search-parts">×</p>
        <div class="pull-down">
            <select name="application">
                <option value="エントリー中">エントリー中</option>
                    <option value="書類選考中">書類選考中</option>
                    <option value="一次選考中">一次選考中</option>
                    <option value="二次選考中">二次選考中</option>
                    <option value="内定">内定</option>
                </select>
        </div>
        <p class="search-parts">×</p>
        <div class="search-box">
                <input type="search" name="search" placeholder="キーワードを入力">
        </div>
        <p class="search-parts">
            <button type="submit"><i class="material-icons">search</i></button>
        </form>
        </p>
    </div>
    <!-- latest list -->
    <section id="latest-list">
        <div class="button-wrapper">
            <a href="/post"><i class="material-icons">add_circle_outline</i></a>
        </div>
        <table>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->limit }}</td><td>{{ $post->prefName }}</td><td>{{ $post->company }}</td><td>{{ $post->StageName }}</td><td>{{ $post->job }}</td><td>{{ $post->officer }}</td><td><a href="{{ action('PostController@show', $post->id) }}">詳細</a></td>
            </tr>
            @endforeach
            </table>
    </section>
    
@endsection
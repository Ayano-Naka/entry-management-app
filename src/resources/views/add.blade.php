@extends('layouts.template')

@section('content')

<!-- title -->
<div class="title">
    <h1>新規登録</h1>
</div>

<!-- add to list -->
<div class="add-wrapper">
    <form action="" method="">
    <table>  
        <tr>
            <td class="item">会社名</td>
            <td>
            <div class="text-box">
                <input type="text" name="company">
            </div>
            </td>
        </tr>
        <tr>
            <td class="item">住所</td>
            <td>
            <div class="pull-down">
                <select name="prefectures">
                    <option value=""hidden>都道府県</option>
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
            <div class="text-box">
                <input type="text" name="address" placeholder="市町村・番地">
            </div>
            </td>
        </tr>
        <tr>
            <td class="item">選考状況</td>
            <td>
            <div class="pull-down">
                <select name="application">
                <option value="エントリー中">エントリー中</option>
                <option value="書類選考中">書類選考中</option>
                <option value="一次選考中">一次選考中</option>
                <option value="二次選考中">二次選考中</option>
                <option value="内定">内定</option>
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
            </td>
        </tr>
        <tr>
            <td class="item">面接予定日時</td>
            <td class="date-time">
                <select name="year">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>　年
                <select name="month">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>　月
                <select name="day">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>　日
            </td>
        </tr>
        <tr>
            <td class="item">担当者</td>
            <td>
            <div class="text-box">
                <input type="text" name="officer">
            </td>
            </div>
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
        <input type="checkbox" name="favorite">Favorite
        <button class="submit-btn">
            <span class="nomal">submit</span>
            <span class="hover">送信</span>
        </button>
    </div>
    </form>
</div>

@endsection
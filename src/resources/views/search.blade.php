@extends('layouts.template')

@section('content')

<!-- title -->
<div class="title">
    <h1>検索結果</h1>
</div>

<!-- list -->
<section id="latest-list">
    <table>
        <tr>
            <td>日付</td><td>エリア</td><td>会社名</td><td>選考状況</td><td>職種</td><td>担当者名</td><td><button>詳細</button></td>
        </tr>
        <tr>
            <td>日付</td><td>エリア</td><td>会社名</td><td>選考状況</td><td>職種</td><td>担当者名</td><td><button>詳細</button></td>
        </tr>
        <tr>
            <td>日付</td><td>エリア</td><td>会社名</td><td>選考状況</td><td>職種</td><td>担当者名</td><td><button>詳細</button></td>
        </tr>
        <tr>
            <td>日付</td><td>エリア</td><td>会社名</td><td>選考状況</td><td>職種</td><td>担当者名</td><td><button>詳細</button></td>
        </tr>
        <tr>
            <td>日付</td><td>エリア</td><td>会社名</td><td>選考状況</td><td>職種</td><td>担当者名</td><td><button>詳細</button></td>
        </tr>
    </table>
    <ul class="paging">
        <li><button><</button></li>
        <li><button>1</button></li>
        <li><button>2</button></li>
        <li><button>3</button></li>
        <li><button>></button></li>
    </ul>
</section>



@endsection
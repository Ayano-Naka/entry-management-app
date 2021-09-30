@extends('layouts.template')

@section('content')

<div class="title">
    <h1>タスクリスト</h1>
</div>

<form action="{{ url('/task')}}" method="POST">
    @csrf
    <div class="todo-wrapper">
        <input type="text" name="task" style="width:30%;">
        <input type="date" name="limit" max="9999-12-31">
        <button class="submit-btn">
            <span class="nomal">submit</span>
            <span class="hover">送信</span>
        </button>
    </div>
    <div class="todo-table">
        <table>
            <tr>
                <td>TODO</td>
                <td>期限</td>
            </tr>
            @foreach ($tasks as $task)
            <tr>
                <td style="border-top: 1px solid #bbbbbb;">
                {{$task -> task}}
                </td>
                <td style="border-top: 1px solid #bbbbbb;">
                {{$task -> limit}}
                </td>
                <td class="edit" style="border-top: 1px solid #bbbbbb;">
                <a href="/edit/{{$task->id}}">編集</a>
                </td>
                <td class="delete" style="border-top: 1px solid #bbbbbb;">
                <a href="">削除</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <ul class="paging">
        <li><button><</button></li>
        <li><button>1</button></li>
        <li><button>2</button></li>
        <li><button>3</button></li>
        <li><button>></button></li>
    </ul>
</form>

@endsection
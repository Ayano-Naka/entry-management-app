@extends('layouts.template')

@section('content')

<div class="title">
    <h1>タスクリスト</h1>
</div>

<form action="{{ url('/task')}}" method="POST">
    @csrf
    <div class="todo-wrapper">
        <table>
            <tr>
                <td>
                    <input type="text" name="task">
                    @error('task')
                        <p class="error-item">{{ $message }}</p>
                    @enderror
                </td>
                <td>
                    <input type="date" name="limit" max="9999-12-31">
                    @error('limit')
                        <p class="error-item">{{ $message }}</p>
                    @enderror
                </td>
                <td>
                    <button class="submit-btn">
                        <span class="nomal">submit</span>
                        <span class="hover">送信</span>
                    </button>
                </td>
            </tr>
        </table>
    </div>
</form>
    <div class="todo-table">
        <table>
            <tr>
                <td>TODO</td>
                <td>期限</td>
            </tr>
            @foreach ($tasks as $task)
            <form action="/task/{{$task->id}}" method="POST">
            {{ csrf_field() }}
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
                <input type="submit" name="delete" value="削除">
                </td>
            </tr>
            </form>
            @endforeach
        </table>
    </div>
    <div class="paging">
        {{ $tasks->links() }}
    </div>

@endsection
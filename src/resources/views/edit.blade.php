@extends('layouts.template')

@section('content')
<form action="{{ url('/edit')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$task->id}}">
    <div class="edit-wrapper">
        <p style="border-bottom: 1px solid #bbbbbb; background:#b3d2ef;">タスクを編集する</p>
        <p>TODO<input type="text" name="task" value="{{$task->task}}" style="width:70%"></p>
        @error('task')
            <p class="error-item">{{ $message }}</p>
        @enderror
        <p>期限<input type="date" name="limit" value="{{$task->limit}}" ></p>
        @error('limit')
            <p class="error-item">{{ $message }}</p>
        @enderror
        <div class="submit-wrapper" style="margin-right: 1rem;">
            <button class="submit-btn">
                <span class="nomal">submit</span>
                <span class="hover">送信</span>
            </button>
        </div>
    </div>
</form>
@endsection
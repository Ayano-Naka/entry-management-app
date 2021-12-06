@extends('layouts.template')

@section('content')
<div id="task_top">
    <div class="title">
        <h1>タスクリスト</h1>
    </div>

    <div class="todo-wrapper">
        <table>
            <tr>
                <td>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" v-model="user_id">
                    <input type="text" class="form-control" placeholder="タスクを入力してください" v-model="new_task">
                    @error('task')
                        <p class="error-item">{{ $message }}</p>
                    @enderror
                </td>
                <td>
                    <input type="date" name="limit" max="9999-12-31" v-model="new_limit">
                    @error('limit')
                        <p class="error-item">{{ $message }}</p>
                    @enderror
                </td>
                <td>
                    <button type="submit" class="submit-btn" @click="addTask">
                        <span class="nomal">submit</span>
                        <span class="hover">送信</span>
                    </button>
                </td>
            </tr>
        </table>
    </div>
    <div class="todo-table">
        <table>
            <tr>
                <td>TODO</td>
                <td>期限</td>
            </tr>
            <tr v-for="task in reverseTasks" v-bind:key="task.id">
                <td v-if="!isEditTask" v-on:dblclick="isEditTask = true" style="border-top: 1px solid #bbbbbb;">
                    @{{task.task}}
                </td>
                <td v-else>
                    <input type="text" v-model="task.task" v-on:blur="updateTask(task)">
                </td>
                <td v-if="!isEditLimit" v-on:dblclick="isEditLimit = true" style="border-top: 1px solid #bbbbbb;">
                    @{{task.limit}}
                </td>
                <td v-else>
                    <input type="text" v-bind:value="task.limit" v-on:blur="updateLimit($event, task_id)">
                </td>
                <td class="delete" style="border-top: 1px solid #bbbbbb;">
                    <button @click="deleteTask(task.id)">削除</button>
                </td>
            </tr>
        </table>
    </div>
</div>

    <script src="{{ asset('js/task.js') }}"></script>
@endsection
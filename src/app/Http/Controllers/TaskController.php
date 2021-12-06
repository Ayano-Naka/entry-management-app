<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTask;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTasks(){
        $tasks = User::find(Auth::id())->tasks;
        return view('task', compact('tasks'));
    }

    public function addTask(Request $request){
    $task = new Task;
    $task->user_id = auth()->id();
    $task->task = $request->task;
    $task->limit = $request->limit;
    $task->save();

    $tasks = User::find(Auth::id())->tasks;
    return $tasks;
    }

    public function deleteTask(Request $request){
        $task = Task::find($request->id)->delete();

        $tasks = User::find(Auth::id())->tasks;
        return $tasks;
    }

    public function editTask(Request $request){
        Task::find($request->id)->update([
            'task' => $request->task,
            'limit' => $request->limit
        ]);
        $tasks = Task::where('user_id', Auth::id())->get();
        return response()->json($tasks);
    }

    public function getData() {
        $task = Task::all();

        return response()->json($task);
    }

    public function getData(){
        $tasks = Task::where('user_id',Auth::id())->get();
        return response()->json($tasks);
    }
}
<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('id','desc')->paginate(5);
        return view('task',[
            "tasks" => $tasks
        ]);
    }

    public function create(Request $request){
        $task = new Task();
        $task->task = $request->task;
        $task->limit = $request->limit;
        $task -> save();
        return redirect('/task');
    }

    public function showEditForm(int $id){
        $task = Task::find($id);
        return view('edit',[
            "task" => $task,
        ]);
    }

    public function edit(Request $request){
        Task::find($request->id)->update([
            'task' => $request->task,
            'limit'=>$request->limit
        ]);
        return redirect('/task');
    }

    public function delete(Request $request){
        Task::find($request->id)->delete();
        return redirect('/task');
    }

}
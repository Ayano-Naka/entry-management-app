<?php

namespace App\Http\Controllers;

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

    public function index(){
        $tasks = Task::orderBy('id','desc')->paginate(5);
        return view('task',[
            "tasks" => $tasks
        ]);
    }

    public function create(CreateTask $request){
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
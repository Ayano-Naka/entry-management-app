<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('entry', [
            'posts' => $posts
        ]);
    }

    public function create(Request $request){
        $post = new Post();
        $post->company = $request->company;
        $post->pref_id = $request->pref_id;
        $post->city = $request->city;
        $post->stage_id = $request->stage_id;
        $post->job = $request->job;
        $post->limit = $request->limit;
        $post-> officer = $request->officer;
        $post->memo = $request->memo;
        $post -> save();
        return redirect('/');
    }

    public function showCreateForm(){
        return view('post');
    }

    public function new(){
        $prefs = config('pref');
        $stages = config('stage');
        return view('/post')->with(['prefs' => $prefs],['stages' => $stages])->with(['stages' => $stages]);
    }

    public function showEdit(int $id){
        $post = Post::find($id);
        return view('editpost',[
            "post" => $post,
        ]);
    }

    public function edit(Request $request){
        Post::find($request->id)->update([
        'company' => $request->company,
        'pref_id' => $request->pref_id,
        'city' => $request->city,
        'stage_id' => $request->stage_id,
        'job' => $request->job,
        'limit' => $request->limit,
        'officer' => $request->officer,
        'memo' => $request->memo
        ]);
        return redirect("/company/{$request->id}");
    }

    public function show(int $id){
        $post = Post::find($id);
        return view('company',[
            'post' => $post,
        ]);
    }

    public function delete(Request $request){
        Post::find($request->id)->delete();
            return redirect('/');
    }

}

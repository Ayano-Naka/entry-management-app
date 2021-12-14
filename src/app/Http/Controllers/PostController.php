<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\CreatePost;


class PostController extends Controller
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

    public function getData(){
        $posts = Post::where('user_id',Auth::id())
        ->orderBy('id','desc')
        ->get();
        return response()->json($posts);
    }

    public function getPosts(){

        $this->posts = new Post();
        $first = $this->posts->getCount(1);
        $second = $this->posts->getCount(2);
        $third = $this->posts->getCount(3);
        $fourth = $this->posts->getCount(4);
        $fifth = $this->posts->getCount(5);

        $posts = Post::where('user_id',Auth::id())->get();

        $prefs = config('pref');
        $stages = config('stage');

        return view('entry', 
        compact('posts','prefs','first','second','third','fourth','fifth'));
    }

    public function getPref(){
        $prefs = config('pref');
        return response()->json($prefs);
    }

    public function getStage(){
        $stages = config('stage');
        return response()->json($stages);
    }

    public function new(){
        $prefs = config('pref');
        $stages = config('stage');
        return view('/post', compact('prefs', 'stages'));
    }

    public function create(CreatePost $request){
        Post::create($request->all());
        return redirect('/');
    }

    public function show(int $id){
        $post = Post::find($id);
        return view('company',
        ['user' => Auth::user() ],
        ['post' => $post]
    );
    }

    public function showEdit(int $id){
        $post = Post::find($id);
        return view('editpost',
        ['user' => Auth::user() ],
        ["post" => $post]
    );
    }

    public function edit(CreatePost $request){
        $post_id = $request->id;
        Post::find($post_id)->update(
            $request->all()
        );
        return redirect("/company/{$post_id}");
    }

    public function showDelete($id){
        $post = Post::find($id);
        return view('companydelete',compact('post'));
    }

    public function delete(Request $request){
        Post::find($request->id)->delete();
            return redirect('/');
    }

}

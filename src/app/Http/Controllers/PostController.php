<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
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

    public function index(Request $request){

        $this->posts = new Post();
        $first = $this->posts->getCount(1);
        $second = $this->posts->getCount(2);
        $third = $this->posts->getCount(3);
        $fourth = $this->posts->getCount(4);
        $fifth = $this->posts->getCount(5);

        $prefs = config('pref');
        $stages = config('stage');

        $query = Post::query()->where('user_id', Auth::id());

        $keyword = $request->keyword;
        $pref_id = $request->pref_id;
        $stage_id =$request->stage_id;

        if(!empty($pref_id)){
            $query->where(function($query) use($pref_id){
                $query->where('pref_id', $pref_id);
            });
        }

        if(!empty($stage_id)){
            $query->where(function($query) use($stage_id){
                $query->where('stage_id', $stage_id);
            });
        }

        if(!empty($keyword)){
            $query->where(function($query) use($keyword){
                $query->Where('company','like','%' . $keyword. '%')
                    ->orWhere('city','like','%' . $keyword. '%')
                    ->orWhere('job','like','%' . $keyword. '%')
                    ->orWhere('officer','like','%' . $keyword. '%')
                    ->orWhere('memo','like','%' . $keyword. '%');
            });
        }

        $posts = $query->orderBy('id','desc')->paginate(4);

        return view('entry',
        compact('posts','first','second','third','fourth','fifth','prefs', 'stages','stage_id','keyword','pref_id')
    );
    }

    public function create(CreatePost $request){
        Post::create($request->all());
        return redirect('/');
    }

    public function new(){
        $prefs = config('pref');
        $stages = config('stage');
        return view('/post', compact('prefs', 'stages'));
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

    public function show(int $id){
        $post = Post::find($id);
        return view('company',
        ['user' => Auth::user() ],
        ['post' => $post]
    );
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

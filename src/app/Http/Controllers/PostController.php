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

    public function getData(Request $request){
        $query = Post::query();

        $pref_id = $request->pref_id;
        $stage_id = $request->stage_id;
        $keyword = $request->keyword;

        if($pref_id !==0){
            if(!empty($pref_id)){
                $query->where(function($query) use($pref_id){
                    $query->where('pref_id', $pref_id);
                });
            }
        }

        if($stage_id !==0){
            if(!empty($stage_id)){
                $query->where(function($query) use($stage_id){
                    $query->where('stage_id', $stage_id);
                });
            }
        }

        if($keyword !==''){
        if(!empty($keyword)){
            $query->where(function($query) use($keyword){
                $query->Where('company','like','%' . $keyword. '%')
                    ->orWhere('city','like','%' . $keyword. '%')
                    ->orWhere('job','like','%' . $keyword. '%')
                    ->orWhere('officer','like','%' . $keyword. '%')
                    ->orWhere('memo','like','%' . $keyword. '%');
            });
        }
    }

        $posts = $query->where('user_id', Auth::id())
                        ->orderBy('id','desc')
                        ->paginate(4);

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

    public function getOptions(){
        $prefs = config('pref');
        $stages = config('stage');
        $first = $this->getCount(1);
        $second = $this->getCount(2);
        $third = $this->getCount(3);
        $fourth = $this->getCount(4);
        $fifth = $this->getCount(5);

        return response()->json([
            'prefs' => $prefs,
            'stages'=> $stages,
            'first' => $first,
            'second' => $second,
            'third' => $third,
            'fourth' => $fourth,
            'fifth' => $fifth
        ]);
    }

    public function getStage(){
        $stages = config('stage');
        return response()->json($stages);
    }

    public function getCount($count){
        $count = Post::where('user_id',Auth::id())
        ->where('stage_id',$count)
        ->get();

        return $count;
    }

    public function getCountOne(){

        $posts = Post::where('user_id',Auth::id())
        ->where('stage_id',1)
        ->get();

        return response()->json($posts);
    }

    public function getCountTwo(){

        $posts = Post::where('user_id',Auth::id())
        ->where('stage_id',2)
        ->get();

        return response()->json($posts);
    }

    public function getCountThree(){

        $posts = Post::where('user_id',Auth::id())
        ->where('stage_id',3)
        ->get();

        return response()->json($posts);
    }


    public function getCountFour(){

        $posts = Post::where('user_id',Auth::id())
        ->where('stage_id',4)
        ->get();

        return response()->json($posts);
    }

    public function getCountFive(){

        $posts = Post::where('user_id',Auth::id())
        ->where('stage_id',5)
        ->get();

        return response()->json($posts);
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
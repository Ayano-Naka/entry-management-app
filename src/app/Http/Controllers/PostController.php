<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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

    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        $this->posts = new Post();
        $first = $this->posts->getCountOne();
        $second = $this->posts->getCountTwo();
        $third = $this->posts->getCountThree();
        $fourth = $this->posts->getCountFour();
        $fifth = $this->posts->getCountFive();

        $prefs = config('pref');
        $stages = config('stage');

        return view('entry',
        compact('posts','first','second','third','fourth','fifth','prefs', 'stages')
    );
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
        return view('company',
        ['user' => Auth::user() ],
        ['post' => $post]
    );
    }

    public function delete(Request $request){
        Post::find($request->id)->delete();
            return redirect('/');
    }

    public function search(Request $request){

        $query = Post::query();

        $keyword = $request->keyword;
        $pref_id = $request->pref_id;
        $stage_id =$request->stage_id;

        if(!empty($pref_id)){
            $query->where('pref_id',$pref_id)->get();
        }

        if(!empty($stage_id)){
            $query->where('stage_id',$stage_id)->get();
        }

        if(!empty($keyword)){
            $query->where('company','like','%' . $keyword. '%')
                    ->orwhere('city','like','%' . $keyword. '%')
                    ->orwhere('job','like','%' . $keyword. '%')
                    ->orwhere('officer','like','%' . $keyword. '%')
                    ->orwhere('memo','like','%' . $keyword. '%')
                    ->get();
        }

        $posts = $query->paginate(5);

        return view('search',compact('posts','keyword','pref_id','stage_id'));
    }

}

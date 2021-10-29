<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = ['company', 'pref_id', 'city','stage_id', 'job', 'limit', 'officer', 'memo']; 

    public function getPrefNameAttribute(){
        return config('pref.'.$this->pref_id);
    }

    public function getStageNameAttribute(){
        return config('stage.'.$this->stage_id);
    }

    public function getCountOne(){
        return DB::table('posts')
        ->select('stage_id')
        ->where('stage_id','1')
        ->selectRaw('COUNT(stage_id) as count_stageIdOne')
        ->groupBy('stage_id')
        ->get();
    }

    public function getCountTwo(){
        return DB::table('posts')
        ->select('stage_id')
        ->where('stage_id','2')
        ->selectRaw('COUNT(stage_id) as count_stageIdTwo')
        ->groupBy('stage_id')
        ->get();
    }

    public function getCountThree(){
        return DB::table('posts')
        ->select('stage_id')
        ->where('stage_id','3')
        ->selectRaw('COUNT(stage_id) as count_stageIdThree')
        ->groupBy('stage_id')
        ->get();
    }

    public function getCountFour(){
        return DB::table('posts')
        ->select('stage_id')
        ->where('stage_id','4')
        ->selectRaw('COUNT(stage_id) as count_stageIdFour')
        ->groupBy('stage_id')
        ->get();
    }

    public function getCountFive(){    
        return DB::table('posts')
        ->select('stage_id')
        ->where('stage_id','5')
        ->selectRaw('COUNT(stage_id) as count_stageIdFive')
        ->groupBy('stage_id')
        ->get();
    }
}

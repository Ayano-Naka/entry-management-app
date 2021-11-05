<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $guarded = ['id']; 

    public function getPrefNameAttribute(){
        return config('pref.'.$this->pref_id);
    }

    public function getStageNameAttribute(){
        return config('stage.'.$this->stage_id);
    }

    public function getCount(){
        return DB::table('posts')
        ->select('stage_id')
        ->where('stage_id',$stage_id)
        ->selectRaw('COUNT(stage_id) as count_stageId')
        ->groupBy('stage_id')
        ->get();
    }

}

<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $guarded = ['id']; 

    protected $appends = ['prefName','stageName'];

    public function getPrefNameAttribute(){
        return config('pref.'.$this->pref_id);
    }

    public function getStageNameAttribute(){
        return config('stage.'.$this->stage_id);
    }

    public function getCount($stage_id){
        return DB::table('posts')
        ->select('stage_id')
        ->where('stage_id',$stage_id)
        ->where('user_id', Auth::id())
        ->selectRaw('COUNT(stage_id) as count_stageId')
        ->groupBy('stage_id')
        ->get();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function setLimitAttribute($field){
        $this->attributes['limit'] = trim($field) !== '' ? $field : null;
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['company', 'pref_id', 'city','stage_id', 'job', 'limit', 'officer', 'memo']; 

    public function getPrefNameAttribute(){
        return config('pref.'.$this->pref_id);
    }

    public function getStageNameAttribute(){
        return config('stage.'.$this->stage_id);
    }
}

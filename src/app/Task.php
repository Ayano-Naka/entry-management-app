<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\Task');
    }

}
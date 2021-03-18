<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    public function FromUser(){
        return $this->belongsTo('App\User', "from_user_id");
    }
    public function ToUser(){
        return $this->belongsTo('App\User', "to_user_id");
    }
}

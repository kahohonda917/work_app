<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    function User(){
        return $this->belongsTo('App\User');
    }
}

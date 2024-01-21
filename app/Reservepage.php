<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservepage extends Model
{
    public function calendars()
     {
         return $this->hasMany('App\Calendar');
     }
     
     public function user()
     {
         return $this->belongsTo('App\User');
     }
     
     public function doreserves()
     {
         return $this->hasMany('App\Doreserve');
     }

}

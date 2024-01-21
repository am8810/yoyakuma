<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public function lessonevent()
     {
         return $this->belongsTo('App\Reservepage');
     }
     
    public function user()
     {
         return $this->belongsTo('App\User');
     }

}

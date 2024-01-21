<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doreserve extends Model
{
     public function reservepage()
     {
         return $this->belongsTo('App\Reservepage');
     }
     
     public function calendar()
    {
        return $this->belongsTo(Calendar::class, 'calendar_id');
    }
    
     public function user()
     {
         return $this->belongsTo('App\User');
     }
}

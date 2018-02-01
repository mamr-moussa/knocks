<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage_member extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function stage()
    {
        return $this->belongsTo('App\Stage','stage_id');
    }
}

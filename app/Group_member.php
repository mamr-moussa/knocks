<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_member extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Group','group_id');
    }
}

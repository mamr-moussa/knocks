<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candy_session extends Model
{
    public function user()
    {
        return $this->belongsTo('App/User','kid_id');

    }
  public function object ()
    {
        return $this->belongsTo('App/obj','object_id');
    }
}

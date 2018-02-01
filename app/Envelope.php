<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envelope extends Model
{
  public function user ()
    {
        return $this->belongsTo('App/User','sender_id');
    }
  public function object ()
    {
        return $this->belongsTo('App/obj','object_id');
    }
}

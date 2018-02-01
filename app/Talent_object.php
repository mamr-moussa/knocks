<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talent_object extends Model
{
  public function user()
    {
        return $this->belongsTo('App/User','user_id');

    }
  public function object ()
    {
        return $this->belongsTo('App/obj','object_id');
    }
  public function talent_object()
    {
        return $this->belongsTo('App/Talent','talent_id');
    }
}

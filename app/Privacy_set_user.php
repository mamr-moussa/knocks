<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy_set_user extends Model
{
  public function users() {
    return $this->belongsTo('App\User','user_id');
  }
  public function object() {
    return $this->belongsTo('App\obj','object_id');
  }
  public function preset() {
    return $this->belongsTo('App\Privacy_preset','preset_id');
  }
}

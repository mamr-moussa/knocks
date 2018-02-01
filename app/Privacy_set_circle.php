<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy_set_circle extends Model
{
  public function preset() {
    return $this->belongsTo('App\Privacy_preset','preset_id');
  }
  public function object() {
    return $this->belongsTo('App\obj','object_id');
  }
  public function circle() {
    return $this->belongsTo('App\Circle','circle_id');
  }
}

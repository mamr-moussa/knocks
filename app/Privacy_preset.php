<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy_preset extends Model
{
  public function privacySetCircles(){
    return $this->hasMany('App\Privacy_set_circle' , 'preset_id');
  }

  public function privacySetUsers(){
    return $this->hasMany('App\Privacy_set_user' , 'preset_id');
  }
}

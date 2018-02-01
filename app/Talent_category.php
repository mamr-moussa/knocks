<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talent_category extends Model
{
  public function talent(){
    return $this->hasMany('App\Talent' , 'category_id');
  }
}

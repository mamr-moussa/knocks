<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
  public function talentCategory()
    {
        return $this->belongsTo('App/Talent_category','category_id');

    }
    public function talentObjects(){
      return $this->hasMany('App\Talenet_object' , 'talent_id');
    }
}

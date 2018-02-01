<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
  public function stageMembers(){
    return $this->hasMany('App\Stage_member' , 'stage_id');
  }
}

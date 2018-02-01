<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function groupMembers(){
    return $this->hasMany('App\Group_member' , 'group_id');
  }
}

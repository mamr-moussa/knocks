<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
  public function user(){
    return $this->belongsTo('App\User' , 'user_id');
  }
  public function object(){
    return $this->belongsTo('App\obj' , 'object_id');
  }

  public function initialize($name){
      $object = new obj();
      $object->initialize('hobby');
      $this->name = $name;
      $this->object_id = $object->id;
      $this->user_id = auth()->user()->id;
      $this->save();
   }
}

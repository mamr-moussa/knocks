<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\ReceivedMethodCalls;

class Career extends Model
{
  public function user(){
    return $this->belongsTo('App\User' , 'user_id');
  }
  public function object(){
    return $this->belongsTo('App\obj' , 'object_id');
  }

  //Career Methods

  public function initialize($works_at,$works_since,$works_to,$works_what,$works_as)
  {
      $object = new obj();
      $object->initialize('career');
      $this->works_at = $works_at;
      $this->works_since = $works_since;
      $this->works_to = $works_to;
      $this->works_what = $works_what;
      $this->works_as = $works_as;
      $this->object_id = $object->id;
      $this->user_id = auth()->user()->id;
      $this->save();

 }

}

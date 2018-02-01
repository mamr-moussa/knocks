<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Public_figure extends Model
{
  public function user(){
    return $this->belongsTo('App\User' , 'user_id');
  }
  public function object(){
    return $this->belongsTo('App\obj' , 'object_id');
  }

  //Methods

  public function initialize($name,$type,$verified)
    {
        $object = new obj();
        $object->initialize(‘public_figure’);
        $this->name = $name;
        $this->type = $type;
        $this->type = $verified;
        $this->object_id = $object->id;
        $this->user_id = auth()->user()->id;
        $this->save();

   }
}

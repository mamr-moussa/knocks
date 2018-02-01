<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Static_message extends Model
{
    public function language(){
      return $this->belongsTo('App\Language' , 'language');
    }
    public function initialize($object){
      $this->id =  (Static_message::all()->max('id')) + 1;
      $this->body =  $object->body;
      $this->language = $object->language;
      $this->save();
    }

    public function translate($object){
      $this->id = $object->id;
      $this->body =  $object->body;
      $this->language = $object->language;
      $this->save();
    }
}

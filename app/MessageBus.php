<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageBus extends Model
{
    public function defineDefault($englishString){
      $this->english_word = $englishString ;
      $this->bus_object = json_encode( array ( 'english' => $englishString ));
      $this->save();
    }
    public function addTranslation($string , $language){
      $object = json_decode($this->bus_object);
      $object->$language = $string ;
      $this->bus_object = json_encode($object);
      $this->update();
    }
}

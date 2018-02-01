<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function staticMessages(){
      return $this->hasMany('App\static_message' , 'language');
    }
    public function intialize($object){
      $this->name = $object ->name;

      if(isset($object->font))
         $this->font_family = $object->font;
     if(isset($object->alignment))
        $this->alignment = $object->alignment;
     $this->save();
    }
}

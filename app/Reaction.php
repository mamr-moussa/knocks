<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
  public function users() {
    return $this->belongsTo('App\User','user_id');
  }
  public function object() {
    return $this->belongsTo('App\obj','object_id');
  }

  public function comment(){
    return $this->belongsTo('App\Comment' , 'parent_id');
  }

  public function knock(){
    return $this->belongsTo('App\Knock' , 'parent_id');
  }

  public function reply(){
    return $this->belongsTo('App\Reply' , 'parent_id');
  }


  //INITIALIZING REACTIONS
   public function initialize($object){
      $pobject = new obj();
      $pobject->initialize('reaction');
      $object = json_decode($object);
      $this->type = $object->type;
      $this->parent_type = $object->type;
      $this->parent_id = $object->parent_id;
      $this->user_id = auth()->user()->id;
      $this->object_id = $pobject->id;
      $this->save();
    }
   function initializeReaction($parent_id,$type){
       $req_react_emj = ['like','angry','sad','laugh','dislike','love','middlefinger','poker'];
       $bad_emj = ['dislike','sad','middlefinger','poker','angry'];
       $parent_object_type = Object::find($parent_id)->type;
       $user_age = Object::find($parent_id)->user()->first()->birthdate;
       $bd = new Carbon($user_age);
       $user_age =  $bd->age;
       if(in_array($type,$req_react_emj)){
         if($user_age < 15){
           if(in_array($type, $bad_emj))
             {
               return 'error age : User Age is Less than 15 years Old';
             }
           else{
              $this->initialize(json_encode( array(
              "type"=> $type,
              "parent_type" => $parent_object_type,
              "parent_id" => $parent_id
           )));
              }
            }
        else{
              $this->initialize(json_encode( array(
              "type"=> $type,
              "parent_type" => $parent_object_type,
              "parent_id" => $parent_id
           )));
               return 'done';
              }
            }
     else
      return 'There is No reaction with that name go check reaction list :)';
 }

}

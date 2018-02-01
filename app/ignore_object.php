<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ignore_object extends Model
{
	public function user(){
      return $this->morphedByMany('App\User' , 'user_id');
    }
    //
}

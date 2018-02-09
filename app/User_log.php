<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;
class User_log extends Model
{
  public function addUserLog($user , $url){
    $agent = new Agent();
  	$this->user_id = $user;
  		$this->index = json_encode(array(
  		'platform'=> $agent->platform() , 
  		'browser'=> $agent->browser() , 
  		'device'=> $agent->device() , 
  		'url' => $url ,
  	));
  	$this->save();
  }
  public function addAnanymousLog($url){
  	$agent = new Agent();
  	$this->index = json_encode(array(
  		'platform'=> $agent->platform() , 
  		'browser'=> $agent->browser() , 
  		'device'=> $agent->device() , 
  		'url' => $url ,
  	));
  	$this->save();
  }   
}

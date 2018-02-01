<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obj;
use App\Reply;

class ReplyController extends Controller
{
    public function create(Request $request){
      $reply = new Reply();

      $reply->initialize(json_encode($request->submit_object));
      return 'done';
    }
    public function retrive(Request $request){
    $request->validate([
      'reply'=>'required'
    ]);

    $reply = Reply::find($request->reply);
    if(obj::find($reply->object_id)->isAvailable(auth()->user()->id))
    //if($comment->user_id != auth()->user()->id)return 'invalid';
      return $reply;
      else return 'invalid';

  }
  public function getReplies(Request $request){
      $request->validate([
        'knock' => 'required' ,
      ]);
      if($request->max == null){
        $replies = Reply::find($request->knock)->replyReplies();
        if($replies != null)
          return $replies->pluck('id');
        else return array();
      }else{
        $replies = Reply::find($request->knock)->replyReplies()->where('id' , '>' , $request->max);
        if($replies)
          return $replies->pluck('id');
        else return array();
      }
    }

}

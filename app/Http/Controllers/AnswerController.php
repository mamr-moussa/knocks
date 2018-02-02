<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
class AnswerController extends Controller
{
    public function create(Request $req){
    	$req->validate([ 'object' => 'required' ]);
    	$answer = Answer::where('user_id' , '=' , auth()->user()->id);
    	$answers = $answer->count();
    	if($answers == 0){
    	  $ans = new Answer();
    	  $ans->user_id = auth()->user()->id;
    	  $ans->index = json_encode( $req->object );
    	  $ans->save();
    	}else{
    		$ans = $answer->first();
    		$ans->index = json_encode($req->object);
    		$ans->update();
    	}
    	return 'done';

    }
}

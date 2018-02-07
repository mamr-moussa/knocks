<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
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
        $qone = Question::find(1);
        $qone->last_update = now();
        $qone->update();
    	return 'done';

    }

    public function userAnswers(Request $req){
        $answers = Answer::where('user_id' , '=' , auth()->user()->id);
        if($answers->count() == 0) return 'no_answers';
        else return array('answers' => json_decode($answers->first()->index) , 'age' => auth()->user()->age());
    }
    public function patch(Request $req){
        //no last update
        $result = array();
        $last_update = Question::find(1)->last_update;
        if($req->last_update == null || $req->last_update != $last_update){
            $answers = Answer::all();
            foreach($answers as $ans){
                if($ans->user()->first()->age() > 12){
                    array_push($result, json_decode($ans->index));
                }

            }
        }else{
            //last update is the same
            if($req->last_update == $last_update)
                 return array('answers'=> $result , 'last_update' => $last_update);
           
        }


        



        //last update is different

        //Return the result

        return array('answers'=> $result , 'last_update' => $last_update);
    }
}

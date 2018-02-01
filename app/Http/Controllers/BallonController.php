<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ballon;
use Carbon\Carbon;

class BallonController extends Controller
{
    public function getUserNotification(Request $request){
    	$ballons = Ballon::where('user_id', '=' , auth()->user()->id)
    	->where('seen' , '=' , 0)
    	->get();
    	return $ballons;
    }
    public function setToPoped(Request $request){
    	$obj = $request->obj;
    	for($i = 0; $i < count($obj); $i++){
    		$current = Ballon::find($obj[$i]);
            if($current != null){
            $current->poped = 1;
            $current->update();
            }

    	}
    	return new Carbon();
    }
}

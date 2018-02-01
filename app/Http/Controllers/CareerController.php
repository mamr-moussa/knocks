<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use App\User;
use App\obj;

class CareerController extends Controller
{
     public function createCareer(Request $request){

    	$newCareer = new Career();
    	$newCareer->initialize(
           $request->works_at,
           $request->works_since,
           $request->works_to,
           $request->works_what,
           $request->works_as
    	);
    	return $newCareer->id;

    }

    public function retriveCareer(Request $request){
        $user = User::find($request->user);
       if(!$user) return 'invalid' ;
       $edus = $user->careers()->get();
       $array = [];
       foreach($edus as $edu){
        if(obj::find($edu->object_id)->isAvailable(auth()->user()->id))
          array_push($array, $edu);
       }
       return $array ;
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\User;
use App\obj;

class EducationController extends Controller
{
     public function createEducation(Request $request){

    	$newEducation = new Education();
    	$newEducation->initialaize(
           $request->study_at,
           $request->study_what,
           $request->study_since,
           $request->study_to,
           $request->grade
    	);
    	return'done';

    }

    public function retriveEducation(Request $request){
       $user = User::find($request->user);
       if(!$user) return 'invalid' ;
       $edus = $user->educations()->get();
       $array = [];
       foreach($edus as $edu){
        if(obj::find($edu->object_id)->isAvailable(auth()->user()->id))
          array_push($array, $edu);
       }
       return $array ;

    }
}

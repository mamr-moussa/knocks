<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LanguageController extends Controller
{
    public function create(Request $request){
      $request->validate([
        'name' => 'required' ,
      ]);
      $lang = new Language();
      $lang->intialize($request);
      return $request->name .' has been added to languages.';
    }

    public function collect(Request $request){
    	return Language::all();
    }

}

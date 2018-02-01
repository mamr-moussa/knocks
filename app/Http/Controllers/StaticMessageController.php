<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Static_message;
class StaticMessageController extends Controller
{
    public function create(Request $request){
      $msg = new Static_message();
      $msg->initialize($request);
      $next_id = (Static_message::all()->max('id')) ;
      return 'The message has been saved , id tooken is `' .$next_id.'`';
    }

    public function translate(Request $request){
      $checker = Static_message::where('id' , '=' , $request->id)
      ->where('language' , '=' , $request->language)->get();
      if($checker->count() > 0)
        return 'whoops!, the message has been already translated in `'.$request->language.'` as `'.
        $checker->first()->body.'`, you can join `Alter` API to change it.';
      $msg = new Static_message();
      $msg->translate($request);
      return 'The translation has been saved';
    }

    public function idOf(Request $request){
      $msg = Static_message::where('language' , '=' , 'english')->where('body' , '=' , $request->q)
      ->get();
      if($msg->count() == 0) return 'the message is not found in english, use glob API to search in other languages';
      return 'this message is assigned to the id `'.$msg->first()->id.'`';
    }

    public function idOfGlob(Request $request){
      $msg = Static_message::where('language' , '=' , $request->language)->where('body' , '=' , $request->q)
      ->get();
      if($msg->count() == 0) return 'the message is not found in `'.
      $request->language.'`, use glob API to search in other languages';
      return 'this message is assigned to the id `'.$msg->first()->id.'`';
    }
    public function getTranslation(Request $request){
      $msg = Static_message::where('language' , '=' , $request->language )
      ->where('id' , '=' , $request->id)->get();
      return $msg->first()->body;
    }
    public function getTranslationByWord(Request $request){
      $msg = Static_message::where('language' , '=' , 'en')->where('body' , '=' , $request->word)
      ->get();
      if($msg->count() == 0) return ' - - ';
      else{
        $id = $msg->first()->id;
        $trans = Static_message::where('language' , '=' , $request->language )
        ->where('id' , '=' , $id)->get();
        if($trans->first())
        return $trans->first()->body; else return '--';
      }

    }

    public function addNewWord(Request $request){
      $checker = Static_message::where('language' , '=' , $request->language)
      ->where('body' , '=' , $request->body)->get();
      if($checker->count() != 0){
        return array(
          "state" => "dublicate" , 
          "found" => $checker
        );
      }else{
        $word = new Static_message();
        $word->language = $request->language;
        $word->body = $request->body;
        $word->id = Static_message::all()->max('id') +1;
        $word->save();
        return array(
          "state" => "done" , 
          "new_id" => Static_message::all()->max('id')
        );
      }
    }
    public function collect(Request $request){
      return Static_message::where('body' , 'like' , '%'.$request->body.'%')
      ->where('language' , 'like' , '%'.$request->language.'%')
      ->orwhere('id' , '=' , $request->id)
      ->orderBy('language')->get();
    }
    public function boundTranslation(Request $request){
      $checker = Static_message::where('id' , '=' , $request->id)
      ->where('language' , '=' , $request->language)->get();
      if($checker->count() > 0)
        return array(
          "state" => "dublicate" , 
          "found" => $checker->first()->body
        );
      $msg = new Static_message();
      $msg->translate($request);
       return array(
          "state" => "done" , 
        );
    }
    public function forceTranslation(Request $request){
      $checker = Static_message::where('id' , '=' , $request->id)
      ->where('language' , '=' , $request->language)->get();
      if($checker->count() > 0){
        $found = $checker->first()->body;
        Static_message::where('id' , '=' , $request->id)
        ->where('language' , '=' , $request->language)->delete();
        $msg = new Static_message();
        $msg->translate($request);
          return array(
          "state" => "override" , 
          "found" => $found,
        );
      }
      $msg = new Static_message();
      $msg->translate($request);
       return array(
          "state" => "done" , 
        );
    }
}

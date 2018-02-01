<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
Using the next APIs for development, they includes:
Creating a language API,
Creating a static message,
Creating a translation a static message,
Getter for all of:
English word id,
Any Language word id,
Word getter by the default user language,

**The apis are responsive and handling many common errors which makes it easier to develop.

**Every API is followed by a discription that shows the required params for each one.

**You need to use an API REST application such as (Advanced REST Client or Postman)
  to use the APIs easily.
*/

Route::post('langs' , 'LanguageController@create');
/*Creat a language
   Params:
   language : eg -> english (required)
   font : eg -> monospace (optional) , (defaulted by : sans-seric)
   alignment : eg -> right (optional) , (defaulted by : left)


   OnSuccess  : x language has been added to languages.

*/
Route::post('smsg' , 'staticMessageController@create');
/*Creat a static message
   Params:
   language : eg -> english (required)
   body : eg -> hello world (required)



   OnSuccess  : the message has been saved , id tooken is 'id'

*/
Route::post('translate' , 'staticMessageController@translate');
/*Creat a static message
   You need to specify the id for the message that you want to translate
   Params:
   language : eg -> english (required)
   body : eg -> hello world (required)
   id : eg -> 1 (required)


   OnSuccess  : the message `x` has been translated to `lang`
   onDublication : the message has already translated to `x`

*/
Route::post('idof' , 'staticMessageController@idOf');
//Get the id of some message in english
//Params :
// q : eg -> hello world (required)
Route::post('glob' , 'staticMessageController@idOfGlob');
//Get the id of some message in any language
//Params :
// q : eg -> hello world (required)
// language : eg -> english (required)
Route::post('gettrans' , 'staticMessageController@getTranslation');
//Get the word in the authorized user language by id
//params : id : eg 1

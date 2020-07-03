<?php

use Illuminate\Http\Request;
use App\User;
use App\PlayerTransform;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('api')->get('/user/{api_token}', function ($api_token) {
//     $user = User::where('api_token',$api_token)->first();
//     return $user;
// });



// Route::middleware('api')->post('/player-transform/{api_token}', function (Request $request,$api_token) {
//     //Log::debug(json_encode($request));
//     $user = User::where('api_token',$api_token)->first();
//     if($user === null){
//         return response()->json(["status"=>"401"]);
//     }
//     $json = $request->getContent();
//     PlayerTransform::create(['user_id'=>$user->id,'transform'=>$json]);
//     return  response()->json(["status"=>"200"]);
// });

// Route::middleware('api')->get('/get/transform/{user}', function (Request $request,User $user) {

//     $data = array();
//     foreach($user->playerTransforms as $pt){
       
//         $data =  array_merge($data , json_decode($pt->transform));
//         //Log::debug($pt->transform);
//     } 
//     //Log::debug($data);
//     return  json_encode($data);
// });

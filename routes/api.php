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

Route::get('/timeline/{user?}', function($user = 'thujohn')
{
    return Twitter::getUserTimeline(['screen_name' => $user, 'count' => 20, 'format' => 'json']);
});

Route::get('/list/{user?}', function ($user = 'thujohn'){
   return Twitter::getHomeTimeline();
});


Route::get('/tweet/{id?}', function ($id = null){
    if (!$id){
        return [];
    }
    return Twitter::getTweet($id, ['format' => 'json']);
});

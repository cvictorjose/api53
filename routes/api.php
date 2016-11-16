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

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/



/*Route::group(['prefix' => 'v1'], function () {
    Route::resource('user', 'UserController',
        ['only' => ['index', 'store', 'update', 'destroy', 'show']]);
});
*/
Route::group(['prefix' => 'v2'], function () {
    Route::resource('user', 'UserController',
        ['only' => ['index', 'store', 'update', 'destroy', 'show']]);
    Route::get('users/names', 'UserController@names');
});

Route::group(['prefix' => 'v3'], function () {
    route::get('upper/{word}', function ($word){
        return ['original'=> $word, 'upper'=> strtoupper($word)];
    });

});

//TOKEN AUTH

Route::group(['prefix' => 'v1'], function () {
    Route::group(['middleware'=> 'auth:api'], function (){
        route::get('upper/{word}', function ($word){
            return ['originalxxx'=> $word, 'upper'=> strtoupper($word)];
        });
    });
});



Route::group(['prefix' => 'v4'], function () {
    Route::group(['middleware'=> 'auth:api'], function (){
        Route::get('users/names', 'UserController@names');
    });
});

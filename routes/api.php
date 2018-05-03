<?php


use Illuminate\Http\Request;

use App\User;
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

// token routes

Route::middleware('auth:api')->group(function (){

     Route::post('logout','api\LoginController@logout');


});

Route::post('/refresh','api\LoginController@refresh');

Route::post('/login','api\LoginController@login');



Route::apiResource('/karateka','api\HomePageController');

Route::post('/getDetails','api\HomePageController@getDetails');

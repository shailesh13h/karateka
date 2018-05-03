<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Model\Karate_ka;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/login', 'api\UserController@login')->name('userLogin');


Route::get('/home', 'HomeController@index')->name('home');

Route::post('/user', 'HomeController@login');


Route::get('/test',function(){

    return Karate_ka::find(2);
});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check',  function() {
  if(Auth::check()) return 'Welcome back, ' . Auth::user()->username;
});



Route::get('/home', array('as' => 'home', 'uses' => 'AuthController@home'));
Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@login'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

Route::group(['middleware' => 'auth'], function(){
  Route::resource('traces', 'TraceController', ['except' => ['edit','update', 'index'] ] );
});

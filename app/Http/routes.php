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
    return view('landing');
});

Route::get('/phpinfo', function() {
  return View::make('phpinfo');
});

Route::get('/environment',function() {
  return getenv('APP_ENV');
});

Route::get('/check',function() {
  if(Auth::check()) return 'Welcome back, ' . Auth::user()->username;

  return 'Hi guest' . link_to_route('login', 'Login with Github!');
});

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@login'));

Route::get('/yay', function(){
  return 'you have logged in';
});
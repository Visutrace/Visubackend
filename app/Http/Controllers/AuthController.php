<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    
  public function login(AuthenticateUser $authenticateUser, Request $request) 
  { 
    return $authenticateUser->execute($request->has('code'), $this);
  }

  public function userHasLoggedIn($user)
  {
    return Redirect('/home');
  }

  public function home()
  {
    return \View::make('home')->withUser(\Auth::user());
  }

  public function logout() 
  {
    \Auth::logout();
    return Redirect('/');
  }
}

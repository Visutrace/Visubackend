<?php 


namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard as Authenticator;
use Laravel\Socialite\Contracts\Factory as Socialite; 

use App\Repositories\UserRepository;

class AuthenticateUser {

  private $users; 
  private $socialite;
  private $auth;


  public function __construct(UserRepository $users, Socialite $socialite, Authenticator $auth)
  {
    $this->users = $users;
    $this->socialite = $socialite;
    $this->auth = $auth;
  }



  public function execute($hasCode, $listener)
  {
    if(!$hasCode) {
      return $this->getAuthorizationFirst();
    } 

     $user =  $this->users->findByUsernameOrCreate($this->getGithubUser());
     $this->auth->login($user, true);

     return $listener->userHasLoggedIn($user);

  }


  private function getGithubUser()
  {
    return $this->socialite->driver('github')->user();
  }


  private function getAuthorizationFirst()
  {
    return $this->socialite->driver('github')->redirect();
  }

}
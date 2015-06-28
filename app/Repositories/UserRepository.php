<?php

namespace App\Repositories;

use App\User;
use Ramsey\Uuid\Uuid;

class UserRepository 
{
  public function findByUsernameOrCreate($userData)
  {
      return User::firstOrCreate([
      'username' => $userData->nickname,
      'email' => isset($userData->email) ? $userData->email : 'test@email.org',
      'avatar' => $userData->avatar
      ]);
  }
}
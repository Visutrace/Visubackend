<?php

namespace App\Repositories;

use App\UserTraces;

class UserTracesRepository 
{
  public function whereUuid($uuid)
  {
      return UserTraces::where('uuid',$uuid)->first();
  }
}
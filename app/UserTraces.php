<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Traces extends Model
{
  protected $table = 'user_traces'


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id', 'user_id'];

    public function user()
    {
      return $this->belongsTo('App\User',)
    }

}
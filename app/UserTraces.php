<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTraces extends Model
{
  protected $table = 'user_traces';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid', 'viewport_x','viewport_y', 'name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id', 'user_id'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

}

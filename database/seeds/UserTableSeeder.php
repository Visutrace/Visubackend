<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('users')->truncate();
      
      factory('App\User', 50)->create()->each(function($u) {

      });
    }
}

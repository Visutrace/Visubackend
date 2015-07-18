<?php

use Illuminate\Database\Seeder;

class User_TracesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('user_traces')->truncate();


      factory('App\UserTraces', 200)->create()->each(function($u) {
        
      });
    }
}

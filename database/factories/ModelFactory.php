<?php



/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'username' => $faker->unique()->username,
        'email' => $faker->unique()->email,
        'avatar' => $faker->colorName, 
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\UserTraces::class, function($faker){
  return [
    'uuid' => $faker->unique()->uuid,
    'user_id' => rand(1,50)
  ];
});
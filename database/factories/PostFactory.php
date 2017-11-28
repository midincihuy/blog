<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
return [
        'user_id' => function(){
            return factory('App\User',1)->create()->first()->id;
        },
        'title' => substr($faker->sentence, 0,50),
        'body' => $faker->paragraph
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
return [
        'user_id' => function(){
            return factory('App\User',1)->create()->first()->id;
        },
        'post_id' => function(){
            return factory('App\Post',1)->create()->first()->id;
        },
        'body' => $faker->paragraph
    ];
});

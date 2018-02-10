<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence(),
        'user_id' => Auth::id(),
    ];
});

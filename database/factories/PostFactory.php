<?php

use Faker\Generator as Faker;
use App\Models\User;
$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'posted_at' => now(),
        'image' => '07abbdfe78165d505710148c290f9289.jpg',
        'author_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});

<?php

use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\User;
$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'author_id' => function () {
            return factory(User::class)->create()->id;
        },
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        },
        'posted_at' => now()
    ];
});

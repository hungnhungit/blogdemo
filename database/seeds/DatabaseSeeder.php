<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
         $tags = ['php','c++','c#','ruby'];


        // factory(Post::class, 20)
        //     ->create()
        //     ->each(function ($post) {
        //         factory(Comment::class, 5)
        //             ->create([
        //                 'post_id' => $post->id
        //             ]);
        //     });

        //Create Tag
        foreach ($tags as $k => $v) {
            Tag::firstOrNew([
                'name' => $v
            ])->save();
        }

    }
}

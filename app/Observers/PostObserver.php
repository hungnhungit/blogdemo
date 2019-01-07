<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
     public function saving(Post $post): void
    {
        $post->slug = str_slug($post->title, '-');
    }
}

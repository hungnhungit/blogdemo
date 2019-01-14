<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
     public function saving(Category $category): void
    {
        $category->slug = str_slug($category->name, '-');
    }
}

<?php
namespace App\Providers;
use App\Models\Post;
use App\Observers\PostObserver;
use App\Models\Category;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
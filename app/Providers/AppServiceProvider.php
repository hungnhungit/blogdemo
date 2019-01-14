<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Illuminate\Support\Facades\Route as DefaultRouter;
use App\Models\Role;
use App\Contracts\Role as RoleContract;
use Illuminate\View\Compilers\BladeCompiler;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->helpers();
        $this->viewShare();
        $this->registerModelBindings();
        $this->registerMacroHelpers();
    }

    /**
     * [helpers description]
     * @return helpers.php
     */
    public function helpers(){

        foreach (glob(__DIR__.'/../Helpers/*.php') as $file) {
            require_once $file;
        }
    }
    public function viewShare(){
        View::share('categories', Category::withCount('posts')->get());
    }

    protected function registerBladeExtensions(){

        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $bladeCompiler->directive('role', function ($arguments) {
                list($role, $guard) = explode(',', $arguments.',');
                return "<?php echo auth({$guard})->check(); ?>";
            });
        });

    }
    protected function registerModelBindings(){
        $this->app->bind(RoleContract::class,Role::class);
    }


    protected function registerMacroHelpers()
    {
        DefaultRouter::macro('roles', function ($roles = []) {
            if (! is_array($roles)) {
                $roles = [$roles];
            }
            $roles = implode('|', $roles);
            $this->middleware("roles:$roles");
            return $this;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBladeExtensions();
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use krproxy\excurso\Models\ExCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // передаем наши категории для построения меню
        view()->share('rootCategories', ExCategory::whereIsRoot()->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}

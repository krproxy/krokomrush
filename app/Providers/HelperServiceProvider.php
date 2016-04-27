<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 07.04.16
 * Time: 23:48
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path().'/Helpers/*.php') as $filename)
        {
            require_once($filename);
        }
    }
}
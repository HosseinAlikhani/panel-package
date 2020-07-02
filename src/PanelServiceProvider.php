<?php
namespace D3CR33\Panel\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Class AuthServiceProvider
 * @package D3CR33\Auth\Provider
 * @author Hossein Alikhani
 */
class PanelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/Resources', 'Panel');
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        $this->publishes([
            __DIR__ . '/Public'    =>  public_path('src'),
        ], 'panel');
    }

    public function register()
    {

    }
}
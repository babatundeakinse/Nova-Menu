<?php

namespace Rende\NovaMenu;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Rende\NovaMenu\Http\Middleware\Authorize;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\Collection;
use Rende\NovaMenu\Contracts\Menu as MenuContract;
use Rende\NovaMenu\Contracts\Item as ItemContract;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-menu');

        $this->app->booted(function () {
            $this->routes();
        });

        if (isNotLumen()) {
            $this->publishes([
                __DIR__.'/../config/nova-menu.php' => config_path('nova-menu.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/migrations/create_menu_tables.php.stub' => $this->getMigrationFileName($filesystem),
            ], 'migrations');

            if (app()->version() >= '5.5') {
                $this->registerMacroHelpers();
            }
        }

        $this->registerModelBindings();

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/rende/nova-menu')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (isNotLumen()) {
            $this->mergeConfigFrom(
                __DIR__.'/../config/nova-menu.php',
                'nova-menu'
            );
        }

        $this->registerBladeExtensions();
    }

    protected function registerModelBindings()
    {
        $config = $this->app->config['menu.models'];

        $this->app->bind(MenuContract::class, $config['menu']);
        $this->app->bind(ItemContract::class, $config['item']);
    }

    protected function registerBladeExtensions()
    {

    }

    protected function registerMacroHelpers()
    {
        Route::macro('item', function ($items = []) {
            if (! is_array($items)) {
                $items = [$items];
            }

            $items = implode('|', $items);

            $this->middleware("item:$items");

            return $this;
        });

        Route::macro('menu', function ($menus = []) {
            if (! is_array($menus)) {
                $menus = [$menus];
            }

            $menus = implode('|', $menus);

            $this->middleware("menu:$menus");

            return $this;
        });
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_menu_tables.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_menu_tables.php")
            ->first();
    }
}

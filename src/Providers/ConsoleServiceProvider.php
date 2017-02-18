<?php

namespace Templei\Command\Providers;

use Illuminate\Support\ServiceProvider;
use Templei\Command\PackageMakeCommand\Models\Package;
use Templei\Command\PackageMakeCommand\PackageMakeCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PackageMakeCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

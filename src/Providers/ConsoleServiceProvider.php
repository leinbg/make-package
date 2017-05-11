<?php

namespace Leinbg\Command\MakePackage\Providers;

use Illuminate\Support\ServiceProvider;
use Leinbg\Command\MakePackage\Models\Package;
use Leinbg\Command\MakePackage\PackageMakeCommand;

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

<?php

namespace Leinbg\Command\MakePackage;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Leinbg\Command\MakePackage\PackageFactory as Factory;
use Leinbg\Command\MakePackage\Models\Package as Model;

class PackageMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:package
                            {vendor : packge vendor}
                            {name : package name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a package';

    protected $factory;

    protected $model;

    public function __construct(Factory $factory, Model $model)
    {
        parent::__construct();
        $this->factory = $factory;
        $this->model = $model;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $package = $this->getNameInput();
        $this->model->init($this->getVendorInput(), $package);
        $this->factory->make($this->model);

        $this->info("Package {$package} generated successfully.");
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return trim($this->argument('name'));
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getVendorInput()
    {
        return trim($this->argument('vendor'));
    }
}

<?php

namespace Templei\Command\PackageMakeCommand;

use Templei\Command\PackageMakeCommand\Generator\DirectoryGenerator;
use Templei\Command\PackageMakeCommand\Generator\TemplateGenerator;
use Templei\Command\PackageMakeCommand\Generator\SourceFileGenerator;
use Templei\Command\PackageMakeCommand\Models\Package as Package;


class PackageFactory
{

    /**
     * make all the files for package
     * @param Templei\Command\PackageMakeCommand\Models\Package $package
     * 
     * @return void
     */
    public function make(Package $package)
    {
    	(new DirectoryGenerator($package))->make();
        (new TemplateGenerator($package))->make();
        (new SourceFileGenerator($package))->make();
    }
}
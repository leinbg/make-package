<?php

namespace Leinbg\Command\MakePackage;

use Leinbg\Command\MakePackage\Generator\DirectoryGenerator;
use Leinbg\Command\MakePackage\Generator\TemplateGenerator;
use Leinbg\Command\MakePackage\Generator\SourceFileGenerator;
use Leinbg\Command\MakePackage\Models\Package as Package;


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

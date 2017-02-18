<?php
namespace Templei\Command\PackageMakeCommand\Generator;

class DirectoryGenerator extends PackageGenerator implements Generatable
{

	/**
     * directories that a package contains
     *
     * @var array
     */
    protected $packageDir = [
        '/resources/views/',
        '/resources/views/{{packagePlural}}/partials',
        '/src/Models/',
        '/src/Providers/',
        '/src/Http/Controllers/',
        '/src/Http/Requests/',
        '/database/migrations/',
        '/routes/',
    ];

	/**
     * create the directories for the package
     *
     * @return void
     */
    public function make()
    {
        // @todo: performance, $packageDir = $this->getCompiledPackageDir()
        foreach ($this->packageDir as $dir) {
            $dir = $this->compile($dir);
            $this->makeDirIfNotExist($dir);
        }
    }

	/**
     * Create the directories if not existed.
     *
     * @return void
     */
    protected function makeDirIfNotExist($dir)
    {
        $packageBaseDir = $this->getPackageBaseDir();
        if (! is_dir(base_path($packageBaseDir . $dir))) {
            mkdir(base_path($packageBaseDir . $dir), 0755, true);
        }
    }
}
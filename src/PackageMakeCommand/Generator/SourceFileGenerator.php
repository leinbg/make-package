<?php
namespace Templei\Command\PackageMakeCommand\Generator;

class SourceFileGenerator extends PackageGenerator implements Generatable
{

    /**
     * The sources that need to be created.
     *
     * @var array
     */
    protected $sources = [
        'model' => [
            'path' => '/src/Models/',
            'file' => '{{packageUc}}.php',
            'stub' => 'model.stub',
        ],
        'controller' => [
            'path' => '/src/Http/Controllers/',
            'file' => '{{packageUc}}Controller.php',
            'stub' => 'controller.stub',
        ],
        'route' => [
            'path' => '/routes/',
            'file' => 'web.php',
            'stub' => 'route.stub',
        ],
        'provider' => [
            'path' => '/src/Providers/',
            'file' => '{{packageUc}}ServiceProvider.php',
            'stub' => 'serviceProvider.stub',
        ],
        'request' => [
            'path' => '/src/Http/Requests/',
            'file' => '{{packageUc}}Request.php',
            'stub' => 'request.stub',
        ],
        'migration' => [
            'path' => '/database/migrations/',
            'file' => '{{datetime}}_create_{{packagePlural}}_table.php',
            'stub' => 'migration.stub',
        ],
        'composer' => [
            'path' => '/',
            'file' => 'composer.json',
            'stub' => 'composer.stub',
        ],
    ];

	/**
     * create the source files for the package
     *
     * @return void
     */
    public function make()
    {
        $sources = $this->getCompiledSources();
        $packageBaseDir = $this->getPackageBaseDir();
        foreach ($sources as $type => $source) {
            $path = $source['path'];
            $file = $source['file'];
            $stub = $source['stub'];
            $absFilePath = $packageBaseDir . $path . $file; 
            $stubPath = '/stubs/src/' . $stub;

            file_put_contents(
                base_path($absFilePath), $this->compileStub($stubPath)
            );
        }
    }

    /**
     * Get compiled Sources
     */ 
    protected function getCompiledSources()
    {
        return $this->compileArray($this->sources);
    }

    /**
     * compile an array
     * @todo: performance , array to string, compile string, string to array
     * 
     * @param array $array
     * @return array
     */
    protected function compileArray($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->compileArray($value);
            } else {
                $array[$key] = $this->compile($value);
            }
        }

        return $array;
    }
}
<?php
namespace Templei\Command\PackageMakeCommand\Generator;

class TemplateGenerator extends PackageGenerator implements Generatable
{

    /**
     * The views that need to be created.
     *
     * @var array
     */
    protected $views = [
        'layout.stub' => 'layout.blade.php',
        'error.stub' => 'error.blade.php',
        'index.stub' => '{{packagePlural}}/index.blade.php',
        'create.stub' => '{{packagePlural}}/create.blade.php',
        'edit.stub' => '{{packagePlural}}/edit.blade.php',
        'show.stub' => '{{packagePlural}}/show.blade.php',
        'form.stub' => '{{packagePlural}}/partials/formModel.blade.php',
        'message.stub' => '{{packagePlural}}/partials/message.blade.php',
    ];

	/**
     * create the templates for the package
     *
     * @return void
     */
    public function make()
    {
        // @todo: performance, $packageDir = $this->getCompiledPackageDir()
        $packageBaseDir = $this->getPackageBaseDir();
        foreach ($this->views as $stub => $file) {
            // @todo $this->compile performance
            $file = $this->compile($file);
            file_put_contents(
                base_path($packageBaseDir . '/resources/views/' . $file),
                $this->compileStub('/stubs/views/' . $stub)
            );
        }
    }
}
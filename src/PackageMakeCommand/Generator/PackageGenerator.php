<?php

namespace Templei\Command\PackageMakeCommand\Generator;

use Illuminate\Support\Str;
use Templei\Command\PackageMakeCommand\Models\Package;

abstract class PackageGenerator implements Generatable
{
    protected $package;

    abstract public function make();

    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    /**
     * Compiles the stub.
     * @param string $path
     * @return string
     */
    protected function compileStub($path)
    {
        return $this->compile(file_get_contents(__DIR__ . '/../' . $path));
    }

	/**
     * Compiles the given string.
     * @param string $str
     * @return string
     */
    protected function compile($str)
    {
        $namespace = $this->package->getNamespace();
        $lower = $this->package->getLowerPackage();
        $lowerPlural = $this->package->getLowerPackagePlural();
        $uc = $this->package->getUcPackage();
        $ucPlural = $this->package->getUcPackagePlural();
        $vendor = $this->package->getVendor();
        $datetime = $this->getDatePrefix();

        return str_replace(
            ['{{namespace}}', '{{package}}', '{{packagePlural}}', '{{packageUc}}', '{{packageUcPlural}}', '{{vendor}}', '{{datetime}}'],
            [$namespace, $lower, $lowerPlural, $uc, $ucPlural, $vendor, $datetime],
            $str
        );
    }

	/**
     * Get the package base directory
     * 
     * @return string
     */
    protected function getPackageBaseDir()
    {
        return $this->package->getPackageBaseDir();
    }

	/**
     * Get the date prefix for the migration.
     *
     * @return string
     */
    protected function getDatePrefix()
    {
        return date('Y_m_d_His');
    }
}

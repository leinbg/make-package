<?php

namespace Templei\Command\PackageMakeCommand\Models;

use Illuminate\Support\Str;

class Package
{
	protected $vendor = '';

	protected $name = '';

    protected $packageBaseDir;

    protected $namespace = '';

    protected $lowerpackage = '';

    protected $lowerpackagePlural = '';

    protected $ucPackage = '';

    protected $ucPackagePlural = '';

	/**
     * init factory with vendor and name
     *
     * @param string $vendor
     * @param string $name
     */
    public function init($vendor, $name)
    {
        $this->setVendor($vendor);
        $this->setName($name);
    }

	public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    public function getVendor()
    {
        return $this->vendor;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
    	return $this->name;
    }

    /**
     * Get the package base directory
     * 
     * @return string
     */
    public function getPackageBaseDir()
    {
        if ($this->packageBaseDir) {
            return $this->packageBaseDir;
        }

        $vendor = $this->getVendor();
        $package = $this->getName();

        return $this->packageBaseDir = "packages/{$vendor}/{$package}";
    }

    /**
     * Get the namespace for package root
     *
     * @return string
     */
    public function getNamespace()
    {
        if ($this->namespace) {
            return $this->namespace;
        }

        $vendor = Str::ucfirst($this->getVendor());
        $package = Str::ucfirst($this->getName());
        $this->namespace = "$vendor\\$package\\";

        return $this->namespace;
    }

    /**
     * Get the lower package name
     *
     * @return string
     */
    public function getLowerPackage()
    {
        if ($this->lowerpackage) {
            return $this->lowerpackage;
        }

        return $this->lowerpackage = Str::lower($this->getName());
    }

    /**
     * Get the lower plural package name
     *
     * @return string
     */
    public function getLowerPackagePlural()
    {
        if ($this->lowerpackagePlural) {
            return $this->lowerpackagePlural;
        }

        return $this->lowerpackagePlural = Str::plural($this->getLowerPackage());
    }

    /**
     * Get the uc package name
     *
     * @return string
     */
    public function getUcPackage()
    {
        if ($this->ucPackage) {
            return $this->ucPackage;
        }

        return $this->ucPackage = Str::ucfirst($this->getLowerPackage());
    }

    /**
     * Get the uc plural package name
     *
     * @return string
     */
    public function getUcPackagePlural()
    {
        if ($this->ucPackagePlural) {
            return $this->ucPackagePlural;
        }

        return $this->ucPackagePlural = Str::plural($this->getUcPackage());
    }
}
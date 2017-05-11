# Make Package Command
create laravel package scaffolder

## how to use
* create package

```
php artisan make:package vendor package
```
* add autoload in composer.json

```
"Vendor\\Package\\": "packages/vendor/package/src"
composer dumpautoload
```
* register service provider in app config

```
Vendor\Package\Providers\PackageServiceProvider::class,
```
* migrate | publish if neccessery

## todos
- vendor and package camelcase
- add more options
	- --default
	- --resource
	- --web
	- --cli

## default package structure
- database
	- migrations
- resources
	- views
- routes
- src
	- Http
		- Controllers
		- Requests
	- Models
	- Providers
- composer.json

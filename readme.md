# Make Package Command
create a package scalfolder for laravel with bulma

## how to use
1. create package
```
php artisan make:package vendor package
```
2. autoload package in composer.json
```
"Vendor\\Package\\": "packages/vendor/package/src"
```
```
composer dumpautoload
```
3. register service provider in app config
```
Vendor\Package\Providers\PackageServiceProvider::class,
```
4. migrate | publish if neccessery

## next release
- tests
- performance
- vendor and package camelcase
- add more options
	- --default
	- --resource
	- --web
	- --cli
- make step 2 automatic like composer require

## package structure
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

<?php

namespace Aamatevosyan\LaravelTrashable;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Aamatevosyan\LaravelTrashable\Commands\LaravelTrashableCommand;

class LaravelTrashableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-trashable')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-trashable_table')
            ->hasCommand(LaravelTrashableCommand::class);
    }
}

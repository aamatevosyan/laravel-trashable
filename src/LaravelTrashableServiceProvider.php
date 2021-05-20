<?php

namespace Aamatevosyan\LaravelTrashable;

use Aamatevosyan\LaravelTrashable\Commands\LaravelTrashableCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

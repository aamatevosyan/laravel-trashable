<?php

namespace Aamatevosyan\LaravelTrashable\Tests;

use Aamatevosyan\LaravelTrashable\LaravelTrashableServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (
                string $modelName
            ) => 'Aamatevosyan\\LaravelTrashable\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        $this->loadLaravelMigrations();

        include_once __DIR__.'/../database/migrations/2021_05_19_204437_add_softdeletes_to_users_table.php';
        (new \AddSoftdeletesToUsersTable())->up();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelTrashableServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        include_once __DIR__.'/../database/migrations/create_laravel-trashable_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}

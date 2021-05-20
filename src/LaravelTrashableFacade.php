<?php

namespace Aamatevosyan\LaravelTrashable;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aamatevosyan\LaravelTrashable\LaravelTrashable
 */
class LaravelTrashableFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-trashable';
    }
}

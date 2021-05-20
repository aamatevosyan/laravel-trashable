<?php

namespace Aamatevosyan\LaravelTrashable\Tests\Http\Controllers;

use Aamatevosyan\LaravelTrashable\Interfaces\IHasTrash;
use Aamatevosyan\LaravelTrashable\Tests\Models\TestUser;
use Aamatevosyan\LaravelTrashable\Traits\HasTrash;
use Illuminate\Routing\Controller;

class TestUserController extends Controller implements IHasTrash
{
    use HasTrash;

    public function getModelClass(): string
    {
        return TestUser::class;
    }
}

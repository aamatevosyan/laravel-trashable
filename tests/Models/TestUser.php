<?php


namespace Aamatevosyan\LaravelTrashable\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestUser extends Model
{
    use SoftDeletes, HasFactory;

    public $guarded = [];
    public $table = 'users';
}

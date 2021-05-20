<?php

namespace Aamatevosyan\LaravelTrashable\Commands;

use Illuminate\Console\Command;

class LaravelTrashableCommand extends Command
{
    public $signature = 'laravel-trashable';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}

<?php

namespace Dualklip\Csc\Commands;

use Illuminate\Console\Command;

class CscCommand extends Command
{
    public $signature = 'csc';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

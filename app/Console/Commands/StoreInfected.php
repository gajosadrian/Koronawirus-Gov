<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StoreInfected extends Command
{
    protected $signature = 'infected:store {when}';
    protected $description = 'Store infected people to database';

    private static $days = ['today', 'yesterday'];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $when = $this->argument('when');

        if ( ! in_array($when, self::$days)) {
            $this->error('Use only <today/yestarday>');
            return;
        }

        $data = getInfoData();

        $this->info("Stored data from {$when}!");
    }
}

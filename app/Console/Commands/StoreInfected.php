<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\InfectedData;

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
            $this->error('Use only <today/yesterday>');
            return;
        }

        $date = today();
        switch ($when) {
            case 'today':
                break;
            case 'yesterday':
                $date->subDay();
                break;
        }

        if ( InfectedData::whereDate('date', $date )->first() ) {
            $this->error('Already added!');
            return;
        }

        $data = (array) getInfoData();
        $infected_data = new InfectedData;
        $infected_data->date = $date;
        $infected_data->infected = $data['Liczba'];
        $infected_data->sick = $data['Liczba'] - $data['Liczba zgonów'] - $data['recovered'];
        $infected_data->recovered = $data['recovered'];
        $infected_data->dead = $data['Liczba zgonów'];
        $infected_data->save();

        $this->info("Stored data from {$when}!");
    }
}

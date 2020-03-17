<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectedData extends Model
{
    protected $table = 'infected_database';
    protected $dates = ['date'];
    protected $appends = ['date_string', 'date_shorter'];

    public function getDateStringAttribute(): string
    {
        return $this->date->toDateString();
    }

    public function getDateShorterAttribute(): string
    {
        return $this->date->format('d-m');
    }
}

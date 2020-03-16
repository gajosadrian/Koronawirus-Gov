<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Setting;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'login' => 'admin',
            'password' => 'omcys0wovzy1j9dc',
        ]);
        Setting::create([
            'key' => 'recovered',
            'val' => 0,
        ]);
    }
}

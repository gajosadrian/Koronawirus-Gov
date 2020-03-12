<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'login' => 'admin',
            'password' => 'dkg290dlgpa921kd',
        ]);
    }
}

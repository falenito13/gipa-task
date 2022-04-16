<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            BroadcasterSeeder::class,
            ProductSeeder::class
        ]);
    }
}

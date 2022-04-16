<?php

use App\Broadcaster;
use Illuminate\Database\Seeder;

class BroadcasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Broadcaster::factory()->count(3)->create();
    }
}

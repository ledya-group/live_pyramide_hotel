<?php

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Agent::class, 10)->create()->each(function($agent) {
            $agent->account()->save(
                factory(App\User::class)->make()
            );
        });
    }
}

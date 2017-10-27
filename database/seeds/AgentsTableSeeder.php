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
        factory(App\Agent::class, 1)->create([
            'first_name' => 'Daniel',
            'last_name' => 'Rubango',
            'email' => 'danielrubango@gmail.com',
            'role_id' => 1
        ])->each(function($agent) {
            $agent->account()->save(
                factory(App\User::class)->make(['username' => 'danielrubango'])
            );
        });
    }
}

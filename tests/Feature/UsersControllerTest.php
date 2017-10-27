<?php

namespace Tests\Feature;

use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_see_all_clients_on_clients_index_page()
    {
        factory(Client::class)->create([ 'first_name' => 'John' ]);
        factory(Client::class)->create([ 'first_name' => 'Jane' ]);
        factory(Client::class)->create([ 'first_name' => 'Janet' ]);

        $this->get(route('clients.index'));

        $this->assertSee('John');
        $this->assertSee('Jane');
        $this->assertSee('Janet');
    }
}

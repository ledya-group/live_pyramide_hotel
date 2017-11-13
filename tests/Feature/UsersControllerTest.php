<?php

namespace Tests\Feature;

use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_see_clients_on_clients_index_page()
    {
        $this->get(route('clients.index'));
        $this->assertTrue(true);
    }
}

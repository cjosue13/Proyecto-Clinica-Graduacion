<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UsersModuleTest extends TestCase
{
    /**
     * el Registro de los usuarios
     *
     * @return test
     */
    function test_Auth()
    {
        $response = $this->get('/auth');
        $response->assertStatus(200);

    }

    /**
     * Ver usuarios específicos por ID
     *
     * @return test
     */
    function test_create_user()
    {
        $response = $this->get('/usuarios/create');
        $response->assertStatus(200);
    }
}

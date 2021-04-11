<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UsersModuleTest extends TestCase
{
    /**
     * Ver la lista de usuarios
     *
     * @return test
     */
    function test_user_list()
    {
        $response = $this->get('/usuarios');

        $response->assertStatus(500);

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

    /**
     * Ver usuarios específicos por ID
     *
     * @return test
     */
    function test_edit_user()
    {
        $response = $this->get('/usuarios/1/edit');
        $response->assertStatus(500);
    }

    /**
     * Ver usuarios específicos por ID
     *
     * @return test
     */
    function test_show_user()
    {
        $response = $this->get('/usuarios/1');
        $response->assertStatus(500);
    }
    
}

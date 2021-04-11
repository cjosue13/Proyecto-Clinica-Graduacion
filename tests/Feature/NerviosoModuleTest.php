<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NerviosoModuleTest extends TestCase
{
    /**
     * Crear sistema nervioso
     *
     * @return test
     */
    public function test_CrearSistemaNervioso()
    {
        $response = $this->get('/sistemanerviosos/create');
        $response->assertStatus(200);
    }
}

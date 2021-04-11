<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsultasModuleTest extends TestCase
{
    /**
     * Crear consultas
     *
     * @return test
     */
    public function test_CrearConsultas()
    {
        $response = $this->get('/consultas/create/7');
        $response->assertStatus(200);
    }
}

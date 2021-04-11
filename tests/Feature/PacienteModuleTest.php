<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacienteModuleTest extends TestCase
{
     /**
     * Crear paciente
     *
     * @return test
     */
    public function test_CrearPaciente()
    {
        $response = $this->get('/pacientes/create');
        $response->assertStatus(200);
    }


}

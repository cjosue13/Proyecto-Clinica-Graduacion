<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpedienteModuleTest extends TestCase
{
        /**
     * Crear Expediente de paciente
     *
     * @return test
     */
    public function test_ExpedientePaciente()
    {
        $response = $this->get('/expediente/create/1');
        $response->assertStatus(200);
    }
}

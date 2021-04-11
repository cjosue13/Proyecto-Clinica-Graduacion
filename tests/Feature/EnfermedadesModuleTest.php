<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnfermedadesModuleTest extends TestCase
{
    /**
     * Crear enfermedades para selección 
     *
     * @return test
     */
    public function test_CrearEnfermedads()
    {
        $response = $this->get('/antenfermedades/create');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExamenesModuleTest extends TestCase
{
    /**
     * Crear exámanes para el expediente
     *
     * @return test
     */
    public function test_CrearExamenes()
    {
        $response = $this->get('/examenes/create/5');
        $response->assertStatus(200);
    }

    /**
     * Crear exámanes clinicos para el expediente
     *
     * @return test
     */
    public function test_CrearExamenesClinicos()
    {
        $response = $this->get('/examenesclinicos/createEC/5');
        $response->assertStatus(200);
    }

    /**
     * Crear exámanes clinicos para el expediente
     *
     * @return test
     */
    public function test_CrearExamenesCardiovasculares()
    {
        $response = $this->get('/exmcardiovasculares/createECAR/11');
        $response->assertStatus(200);
    }
    
    /**
     * Crear exámanes digestivos para el expediente
     *
     * @return test
     */
    public function test_ExamenApariencia()
    {
        $response = $this->get('/apariencias/createAPAR/11');
        $response->assertStatus(200);
    }
}

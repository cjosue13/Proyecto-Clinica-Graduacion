<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacienteModuleTest extends TestCase
{
    /**
     * Ver la lista de pacientes
     *
     * @return test
     */
    public function test_listaPacientes()
    {
        $response = $this->get('/pacientes');

        $response->assertStatus(500);
    }

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

     /**
     * Editar un paciente
     *
     * @return test
     */
    public function test_EditarPaciente()
    {
        $response = $this->get('/pacientes/1/edit');
        $response->assertStatus(500);
    }

    /**
     * PDF de paciente
     *
     * @return test
     */
    public function test_GenerarPDFPaciente()
    {
        $response = $this->get('/pacientes/pdf/1');
        $response->assertStatus(500);
    }

    /**
     * Filtro de pacientes
     *
     * @return test
     */
    public function test_FiltroPaciente()
    {
        $response = $this->get('/pacientes/filtro?txt_nombre=Pedro');
        $response->assertStatus(500);
    }
}

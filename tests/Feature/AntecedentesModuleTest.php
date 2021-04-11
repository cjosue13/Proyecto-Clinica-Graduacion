<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AntecedentesModuleTest extends TestCase
{
     /**
     * Crear antecedentes quirurgicos para expediente
     *
     * @return test
     */
    public function test_AntecedentesQuirurgicos()
    {
        $response = $this->get('/antQuiruTrau/createQT/8/q?');
        $response->assertStatus(200);
    }

     /**
     * Crear antecedentes traumáticos para expediente
     *
     * @return test
     */
    public function test_AntecedentesTraumaticos()
    {
        $response = $this->get('/antQuiruTrau/createQT/8/t?');
        $response->assertStatus(200);
    }

    /**
     * Crear antecedentes traumáticos para expediente
     *
     * @return test
     */
    public function test_AntecedentesPersonalSocial()
    {
        $response = $this->get('personalsocial/create/7');
        $response->assertStatus(200);
    }

    

    ///personalsocial/create/7
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AgendaModuleTest extends TestCase
{
    /**
     * Ver agenda, desde acá se guarda, edita elimina
     *
     * @return test
     */
    public function test_VerAgenda()
    {
        $response = $this->get('/agenda');

        $response->assertStatus(200);
    }
}

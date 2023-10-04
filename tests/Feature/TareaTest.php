<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TareaTest extends TestCase
{
    public function test_VerificarDelListado()
    {
        $response = $this->put('/api/v1/tarea/ListarTarea/3');
        $response->assertStatus(200);
    }

}

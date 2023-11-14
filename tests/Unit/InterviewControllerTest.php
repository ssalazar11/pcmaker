<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Interview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InterviewControllerTest extends TestCase
{
    //use RefreshDatabase;

    public function testStoreMethod()
    {
        // Simular un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);

        // Datos de la entrevista
        $interviewData = [
            'questions' => '¿Cuáles son tus expectativas salariales?'
        ];

        // Realizar la petición
        $response = $this->post('/interview/store', $interviewData);

        // Aserciones para verificar si la entrevista se creó
        $this->assertDatabaseHas('interviews', [
            'user_id' => $user->getId(),
            'questions' => $interviewData['questions']
        ]);

        // Verificar que la respuesta sea un redirect
        $response->assertRedirect();
    }
}

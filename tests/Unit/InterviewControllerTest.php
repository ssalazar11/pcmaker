<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Interview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InterviewControllerTest extends TestCase
{
    public function testStoreMethod()
    {
        $user = User::factory()->create(); // Simulate an authenticated user
        $this->actingAs($user); // Act as the authenticated user

        $interviewData = [
            'questions' => 'Sample questions', //This data simulates what a user would submit through a form
        ];

        $this->post(route('interview.store'), $interviewData)->assertRedirect(); //Make a POST request to the store method of the interview controller and verify that there is a redirect

        $this->assertDatabaseHas('interviews', ['questions' => 'Sample questions']); // Verify that the interview data has been stored correctly in the database
    }
}

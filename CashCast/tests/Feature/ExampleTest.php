<?php

namespace Tests\Feature;use Illuminate\Foundation\Testing\RefreshDatabase;use Tests\TestCase;class ExampleTest extends TestCase{    use RefreshDatabase;    /**     * A basic test example.     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $user = \App\Models\User::factory()->create();
 
        $response = $this->actingAs($user)->get('/');

        $response->dump(); // Dump the response content and headers

        $response->assertStatus(200);
    }
}

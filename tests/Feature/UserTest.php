<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @UserTest
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_create_user_success(): void
    {
        $response = $this->post('api/user', [
            "name" => "Teste Dev",
            "email" =>  "teste@teste.com",
            "password" => "@tEste24",
            "passwordConfirmation" => "@tEste24"
        ]);
        $response->assertStatus(201);
    }

    /**
     * @return void
     */
    public function test_create_user_fails(): void
    {
        $response = $this->post('api/user', [
            'name' => 'teste dev'
        ]);
        $response->assertStatus(422);
    }

    /**
     * @return void
     */
    public function test_create_user_with_email_already_used(): void
    {
        $data = [
            "name" => "Teste Dev",
            "email" =>  "teste@teste.com",
            "password" => "@tEste24"
        ];
        User::factory()->create($data);
        $response = $this->post('api/user', $data);
        $response->assertStatus(422);
    }

    /**
     * @return void
     */
    public function test_get_all_users(): void
    {
        $response = $this->get('api/user');
        $response->assertStatus(200);
    }
}

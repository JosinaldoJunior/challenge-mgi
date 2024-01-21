<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
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

        $response->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ]
        ]);
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
        $this->assertEquals('Este endereço de e-mail já está sendo utilizado.', Arr::first($response->json()['errors']['email']));
        $response->assertStatus(422);
    }

    /**
     * @return void
     */
    public function test_get_all_users(): void
    {
        User::factory(10)->create();
        $response = $this->get('api/user');
        $this->assertTrue($response->json()['meta']['total'] === 10);
        $response->assertStatus(200);
    }
}

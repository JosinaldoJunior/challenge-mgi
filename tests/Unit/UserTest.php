<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \Tests\TestCase;

/**
 *
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function test_create_user(): void
    {
        $data = [
            "name" => "Teste Dev Unit",
            "email" =>  "teste@teste.com",
            "password" => "@tEste24"
        ];

        $userService = app()->make(UserService::class);
        $user = $userService->createUser($data);
        $this->assertModelExists($user);
        $this->assertTrue(true);
    }

    /**
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function test_get_all_users(): void
    {
        $quantity = 100;
        User::factory($quantity)->create();
        $userService = app()->make(UserService::class);
        $users = $userService->getAllUsers();
        $this->assertTrue($users->toArray()['total'] === $quantity);
        $this->assertTrue(true);
    }

    /**
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function test_generate_hash_password(): void
    {
        $data = [
            "name" => "Teste Dev Unit",
            "email" =>  "teste@teste.com",
            "password" => "@tEste24"
        ];

        $userService = app()->make(UserService::class);
        $result = $userService->generateHashPassword($data);
        $this->assertIsArray($result);
    }
}

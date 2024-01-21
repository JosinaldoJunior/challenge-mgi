<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\IUserRepository;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Pagination\LengthAwarePaginator;
use \App\Models\User;

/**
 * @UserService
 */
class UserService implements IUserService
{
    /**
     * @param IUserRepository $userRepository
     */
    public function __construct(private IUserRepository $userRepository)
    {
    }

    /**
     * @param array $data
     * @return \App\Models\User
     */
    public function createUser(array $data): User
    {
        $data = $this->generateHashPassword($data);
        return $this->userRepository->create($data);
    }

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllUsers(): LengthAwarePaginator
    {
        return $this->userRepository->getAll();
    }

    /**
     * @param array $data
     * @return array
     */
    public function generateHashPassword(array $data) : array
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}

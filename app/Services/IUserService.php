<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use \App\Models\User;

/**
 *
 */
interface IUserService
{
    /**
     * @param array $data
     * @return User
     */
    public function createUser(array $data) : User;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllUsers() : LengthAwarePaginator;

    /**
     * @param array $data
     * @return array
     */
    public function generateHashPassword(array $data) : array;
}

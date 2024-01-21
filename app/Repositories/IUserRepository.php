<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use \App\Models\User;

/**
 * @IUserRepository
 */
interface IUserRepository
{
    /**
     * @param array $data
     * @return User
     */
    public function create(array $data) : User;

    /**
     * @return LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator;
}

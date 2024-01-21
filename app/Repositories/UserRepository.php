<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

/**
 * @UserRepository
 */
class UserRepository implements IUserRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) : User
    {
        try {
            return User::create($data);
        } catch (\Exception $error) {
            Log::error('ERROR_CREATE_USER', [
                'error' => $error
            ]);
            throw new HttpResponseException(response()->json([
                'error' => "Erro ao realizar o cadastro de usuário. Tente novamente mais tarde."
            ], 500));
        }
    }


    /**
     * @return LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator
    {
        return User::paginate(5);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Services\IUserService;

/**
 * @UserController
 */
class UserController extends Controller
{

    /**
     * @param IUserService $userService
     */
    public function __construct(protected IUserService $userService)
    {
    }

    /**
     * @param UserCreateRequest $request
     * @return UserResource
     */
    public function register(UserCreateRequest $request)
    {
        $user = $this->userService->createUser($request->all());
        return new UserResource($user);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('register');
    }

    /**
     * @param UserRegisterRequest $userRegisterRequest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRegisterRequest $userRegisterRequest)
    {
        $this->userService->createUser($userRegisterRequest->all());
        notify()->success('Usuário cadastrado com sucesso!');

        return redirect('/');
    }

    /**
     * @return UserCollection
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return new UserCollection($users);
    }
}

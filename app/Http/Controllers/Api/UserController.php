<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Requests\Api\User\LoginRequest;
use App\Services\Api\UserService;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    // 用户登录
    public function login(LoginRequest $request)
    {
        return $this->service->login($request->validated());
    }


    // 用户注销
    public function logout()
    {

    }


}
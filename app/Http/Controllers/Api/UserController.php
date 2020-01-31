<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Requests\Api\User\LoginRequest;
use App\Requests\Api\User\RegisterRequest;
use App\Services\Api\UserService;

/**
 * 用户相关模块
 * Class UserController
 * @package App\Http\Controllers\Api
 */
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

    public function register(RegisterRequest $request)
    {
        return $this->service->register($request->validated());
    }

}
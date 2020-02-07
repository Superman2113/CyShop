<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Requests\Api\User\LoginRequest;
use App\Requests\Api\User\RegisterRequest;
use App\Requests\Api\User\UpdateInfoRequest;
use App\Services\Api\UserService;
use Exception;

/**
 * 用户相关接口
 * @package App\Http\Controllers\Api
 */
class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * 用户登录
     * @param LoginRequest $request
     * @return false|string
     */
    public function login(LoginRequest $request)
    {
        return $this->service->login($request->validated());
    }

    /**
     * 用户注册
     * @param RegisterRequest $request
     * @return false|string
     * @throws Exception
     */
    public function register(RegisterRequest $request)
    {
        return $this->service->register($request->validated());
    }

    /**
     * 注销登录
     * @return false|string
     */
    public function logout()
    {
        return $this->service->logout();
    }



    public function info(UpdateInfoRequest $request)
    {
        return $this->service->info($request->validated());
    }
}
<?php


namespace App\Services\Api;


use App\Repositories\UserRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Contracts\Auth\Guard;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Tymon\JWTAuth\JWTAuth;


class UserService extends BaseService
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 用户登录
     * @param $params
     * @return false|string
     */
    public function login($params)
    {

        $params['password'] = \Hash::make($params['password']);

        $res = \auth('api')->attempt($params);
        dd($res);
    }


    /**
     * 用户注册
     * @param $params
     * @return false|string
     * @throws Exception
     */
    public function register($params)
    {
        unset($params['password_confirmation']);
        $params['password'] = \Hash::make($params['password']);
        $flag = $this->repository->create($params);
        if ($flag) {
            return $this->data(['name'=>$params['name']], '注册成功');
        }
        return $this->error(20001, '注册失败');
    }


    /**
     * 用户注销
     */
    public function logout()
    {
        return $this->data(true, '注销成功');
    }
}
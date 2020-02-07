<?php


namespace App\Services\Api;


use App\Codes\ErrorCode;
use App\Repositories\UserRepository;
use App\Services\BaseService;
use Exception;


/**
 * 用户信息相关业务逻辑
 * @package App\Services\Api
 */
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
        $token = \auth('api')->attempt($params);
        if (!$token) {
            return $this->error(10001, '账号不存在或密码错误');
        }
        $user = $this->repository->getUserInfoById(\auth('api')->id());
        $user->token = 'Bearer ' . $token;
        return $this->data($user, '登录成功!');
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
        $params['password'] = md5($params['password']);
        $flag = $this->repository->create($params);
        if ($flag) {
            return $this->data(['name'=>$params['name']], '注册成功');
        }
        return $this->error(ErrorCode::INSERT_FAILED, '注册失败');
    }


    /**
     * 用户注销
     */
    public function logout()
    {
        \auth('api')->logout();// 注销操作需要已登录，在中间件中已认证无需再次认证!
        return $this->data(true, '注销成功');
    }

    /**
     * 更新用户信息
     * @param $data
     * @return false|string
     */
    public function info($data)
    {
        $ok = $this->repository->updateUserInfo($data);
        if ($ok) {
            return $this->data(true, '更新成功');
        }
        return $this->error(ErrorCode::UPDATE_FAILED,'更新失败');
    }
}
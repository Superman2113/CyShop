<?php


namespace App\Services\Api;


use App\Codes\ErrorCode;
use App\Codes\LoginStatusCode;
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
            $this->rememberLoginLog($params['name'], LoginStatusCode::LOGIN_STATUS_FAILED);
            return $this->error(10001, '账号不存在或密码错误');
        }
        $user = $this->repository->getUserInfoById(\auth('api')->id());
        $user->token = 'Bearer ' . $token;
        $this->rememberLoginLog($params['name'], LoginStatusCode::LOGIN_STATUS_SUCCESS);
        return $this->data($user, '登录成功!');
    }


    /**
     * 用户注册
     * @param $params
     * @return false|string
     * @throws Exception
     */
    public function mregister($params)
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
    public function profile($data)
    {
        $ok = $this->repository->updateUserProfile($data);
        if ($ok) {
            return $this->data(true, '更新成功');
        }
        return $this->error(ErrorCode::UPDATE_FAILED,'更新失败');
    }

    /**
     * 记录登录日志
     * @param $name
     * @param int $login_status
     */
    private function rememberLoginLog($name, $login_status=LoginStatusCode::LOGIN_STATUS_FAILED)
    {
        $user_id = $this->repository->getUserIdByName($name);

        if (!$user_id) { // 找不到该用户无需记录
            return;
        }
        $login_ip = request()->getClientIp();
        $login_ip = ip2long($login_ip);
        $this->repository->rememberLoginLog($user_id, $login_status, $login_ip);
    }
}
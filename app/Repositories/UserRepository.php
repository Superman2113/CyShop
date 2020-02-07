<?php


namespace App\Repositories;


use App\Codes\LoginStatusCode;
use App\Models\UserInfoModel;
use App\Models\UsersModel;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    protected $model;

    public function __construct(UsersModel $model)
    {
        $this->model = $model;
    }

    /**
     * 创建用户
     * @param $data
     * @return bool
     * @throws Exception
     */
    public function create($data)
    {
        \DB::beginTransaction();
        try {
            $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s', time());
            $user_id = $this->model->insertGetId($data); // 使用该方法不会自动更新时间字段
            $this->model->userInfo()->insert([
                'user_id' => $user_id,
                'registered_time' => date('Y-m-d H:i:s', time()),
                'nickname' => '用户:' . $user_id,
            ]);
            \DB::commit();
            return true;
        }catch (Exception $exception) {
            dd($exception->getMessage());
            \DB::rollBack();
            return false;
        }
    }

    /**
     * 获取用户详情
     * @param $id
     * @return UsersModel|Builder|Model|object|null
     */
    public function getUserInfoById($id)
    {
        return $this->model->with('userInfo')->first(['id', 'name']);
    }

    /**
     * 更新用户详情
     * @param $data
     * @return bool
     */
    public function updateUserInfo($data)
    {
        $user = $this->model->find(auth('api')->id());
        try {
            $user->userInfo()->update($data);
            return true;
        } catch (Exception $exception) {
            return false;
        }

    }


    /**
     * 记录用户登录日志
     * @param int $user_id
     * @param int $login_status
     * @param int $login_ip
     */
    public function rememberLoginLog(int $user_id, int $login_status, int $login_ip)
    {
        $this->model->userLoginLog()->insert([
            'user_id' => $user_id,
            'login_status' => $login_status,
            'login_ip' => $login_ip,
            'login_time' => date('Y-m-d H:i:s', time())
        ]);
    }

    /**
     * 根据用户名查找用户ID
     * @param $name
     * @return mixed
     */
    public function getUserIdByName($name)
    {
        return $this->model->whereName($name)->value('id');
    }
}
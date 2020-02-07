<?php


namespace App\Repositories;


use App\Models\UserInfoModel;
use App\Models\UsersModel;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    protected $userModel;
    protected $userInfoModel;

    public function __construct(UsersModel $userModel, UserInfoModel $userInfoModel)
    {
        $this->userModel = $userModel;
        $this->userInfoModel = $userInfoModel;
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
            $user_id = $this->userModel->insertGetId($data); // 使用该方法不会自动更新时间字段
            $this->userInfoModel->insert([
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
        return $this->userModel->with('userInfo')->first(['id', 'name']);
    }

    /**
     * 更新用户详情
     * @param $data
     * @return bool
     */
    public function updateUserInfo($data)
    {
        $user_id = auth('api')->id();
        try {
            $this->userInfoModel->whereUserId($user_id)->update($data);
            return true;
        } catch (Exception $exception) {
            return false;
        }

    }
}
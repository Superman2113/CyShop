<?php


namespace App\Repositories;


use App\Models\UserInfoModel;
use App\Models\UsersModel;
use Exception;

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

    public function getUserById($id)
    {
        return $this->model->find($id);
    }
}
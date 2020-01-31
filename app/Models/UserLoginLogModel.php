<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * 用户登录日志表
 * Class UserLoginLogModel
 * @package App\Models
 */
class UserLoginLogModel extends Model
{
    protected $table = 'user_login_log';

    const LOGIN_STATUS_SUCCESS = 1;
    const LOGIN_STATUS_FAILED = 0;
    const LOGIN_STATUS_MAP = [
        self::LOGIN_STATUS_SUCCESS => '成功',
        self::LOGIN_STATUS_FAILED => '失败'
    ];
}
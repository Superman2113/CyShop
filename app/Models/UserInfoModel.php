<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserInfoModel extends Model
{
    protected $table = 'user_info';

    public $timestamps = false;

    const SEX_SECRET = 0; // 保密
    const SEX_MAN = 1;  //男
    const SEX_WOMAN = 2; //女

    const SEX_MAP = [  // 性别对应状态
        self::SEX_SECRET => '保密',
        self::SEX_MAN => '男',
        self::SEX_WOMAN => '女'
    ];


    // 关联用户表
    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id', 'id');
    }
}
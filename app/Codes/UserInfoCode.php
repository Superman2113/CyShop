<?php


namespace App\Codes;


/**
 * 用户详情相关状态码定义
 * @package App\Codes
 */
class UserInfoCode
{
    const SEX_SECRET = 0; // 保密
    const SEX_MAN = 1;  //男
    const SEX_WOMAN = 2; //女

    const SEX_MAP = [  // 性别对应状态
        self::SEX_SECRET => '保密',
        self::SEX_MAN => '男',
        self::SEX_WOMAN => '女'
    ];
}
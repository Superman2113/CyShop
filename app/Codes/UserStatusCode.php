<?php


namespace App\Codes;


/**
 * 用户相关状态码定义
 * @package App\Codes
 */
class UserStatusCode
{
    CONST USER_STATUS_ON = 1;  // 账号启用
    CONST USER_STATUS_OFF = 0; // 账号禁用

    CONST USER_STATUS_MAP = [
        self::USER_STATUS_ON => '启用',
        self::USER_STATUS_OFF => '禁用'
    ];

}
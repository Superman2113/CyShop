<?php


namespace App\Codes;

/**
 * 登录日志状态码定义
 * @package App\Codes
 */
class LoginStatusCode
{
    const LOGIN_STATUS_SUCCESS = 1;
    const LOGIN_STATUS_FAILED = 0;

    const LOGIN_STATUS_MAP = [
        self::LOGIN_STATUS_SUCCESS => '成功',
        self::LOGIN_STATUS_FAILED => '失败'
    ];
}
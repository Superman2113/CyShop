<?php


namespace App\Codes;

/**
 * 错误码定义
 * @package App\Codes
 */
class ErrorCode
{
    const INVALID_PARAM = 10000;  // 参数无效


    const SELECT_FAILED = 20001;   // 查询失败
    const INSERT_FAILED = 20002;   // 插入失败
    const UPDATE_FAILED = 20003;   // 更新失败
    const DELETE_FAILED = 20004;   // 删除失败

    const LOST_TOKEN = 40001;  // 缺少TOKEN
    const INVALID_TOKEN = 40001;  // 无效TOKEN
    const UNAUTHORIZED_ERROR = 40003; // 未认证操作


    const SYSTEM_ERROR = 50000; // 系统异常
}
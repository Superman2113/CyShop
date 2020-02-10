<?php


namespace App\Codes;


class BoolCode
{
    const IS_TRUE = 1;
    const IS_FALSE = 0;

    const BOOL_STATUS_MAP = [
        self::IS_TRUE => '是',
        self::IS_FALSE => '否'
    ];
}
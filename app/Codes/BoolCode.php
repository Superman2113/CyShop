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

    const BOOL_TRUE_FALSE_SWITCH = [
        'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
        'off' => ['value' => 0, 'text' => '否', 'color' => 'default'],
    ];

    const BOOL_ON_OFF_SWITCH = [
        'on'  => ['value' => 1, 'text' => '启用', 'color' => 'primary'],
        'off' => ['value' => 0, 'text' => '禁用', 'color' => 'default'],
    ];
}
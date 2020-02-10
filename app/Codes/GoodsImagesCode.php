<?php


namespace App\Codes;


class GoodsImagesCode
{
    const IS_MASTER = 1;
    const IS_NOT_MASTER = 0;

    const MASTER_MAP = [
        self::IS_MASTER => '是',
        self::IS_NOT_MASTER => '否'
    ];

}
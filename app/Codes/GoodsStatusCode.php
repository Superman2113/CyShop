<?php


namespace App\Codes;


class GoodsStatusCode
{
    const ON_SALE = 1;
    const OFF_SALE = 0;

    const SALE_STATUS_MAP = [
        self::ON_SALE => '是',
        self::OFF_SALE => '否'
    ];
}
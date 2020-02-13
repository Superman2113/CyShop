<?php


namespace App\Codes;

/**
 * 支付方式
 * @package App\Codes
 */
class PaymentCode
{
    const PAY_WECHAT = 1;
    const PAY_ALIPY =  2;
    const PAY_EBANK = 3;
    const PAY_COLLECTION = 4;

    const PAYMENT_MAP = [
        self::PAY_WECHAT => '微信',
        self::PAY_ALIPY  => '支付宝',
        self::PAY_EBANK  => '网银',
        self::PAY_COLLECTION => '到付'
    ];

}
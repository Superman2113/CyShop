<?php


namespace App\Codes;


class CouponCode
{
    const COUPON_FULL_CAT = 1;
    const COUPON_DISCOUNT = 2;

    const COUPON_TYPE_MAP = [
        self::COUPON_FULL_CAT => '满减',
        self::COUPON_DISCOUNT => '打折'
    ];

    const COUPON_TYPE_SWITCH = [
        'on'  => ['value' => self::COUPON_FULL_CAT, 'text' => '满减', 'color' => 'primary'],
        'off' => ['value' => self::COUPON_DISCOUNT, 'text' => '打折', 'color' => 'default'],
    ];
}
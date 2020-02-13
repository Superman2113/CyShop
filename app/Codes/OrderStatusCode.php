<?php


namespace App\Codes;

/**
 * 订单状态码
 * Class OrderStatusCode
 * @package App\Codes
 */
class OrderStatusCode
{
    const ORDER_NOT_PAY = 1;
    const ORDER_IS_PAY = 2;
    const ORDER_IS_SEND = 3;
    const ORDER_SENDING = 4;
    const ORDER_REFUNDING = 5;
    const ORDER_REFUNDED = 6;
    const ORDER_RECEIVE = 7;

    const ORDER_STATUS_MAP = [
        self::ORDER_NOT_PAY => '未支付',
        self::ORDER_IS_PAY => '已支付',
        self::ORDER_IS_SEND => '已发货',
        self::ORDER_SENDING =>  '配送中',
        self::ORDER_REFUNDED => '已退款',
        self::ORDER_REFUNDING => '退款中',
        self::ORDER_RECEIVE => '已收货'
    ];
}
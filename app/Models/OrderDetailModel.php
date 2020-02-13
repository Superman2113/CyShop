<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetailModel extends Model
{
    protected $table = 'order_detail';


    protected $fillable = ['order_id', 'goods_id', 'buy_num', 'single_price', 'average_cost', 'fee_money'];

    /**
     * 关联订单主表
     * @return BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(OrderMasterModel::class, 'order_id', 'id');
    }
}

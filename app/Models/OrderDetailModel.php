<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetailModel extends Model
{
    protected $table = 'order_detail';

    /**
     * 关联订单主表
     * @return BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(OrderMasterModel::class, 'order_id', 'id');
    }
}

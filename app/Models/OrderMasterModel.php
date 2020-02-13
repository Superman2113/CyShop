<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderMasterModel extends Model
{
    protected $table = 'order_master';

    /**
     * 关联用户
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id', 'id');
    }

    /**
     * 关联订单详情
     * @return HasMany
     */
    public function detail()
    {
        return $this->hasMany(OrderDetailModel::class, 'order_id','id');
    }
}

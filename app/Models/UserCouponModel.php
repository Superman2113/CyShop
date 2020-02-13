<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCouponModel extends Model
{
    protected $table = 'user_coupon';

    /**
     * 关联用户
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function coupon()
    {
        return $this->belongsTo(CouponModel::class, 'coupon_id', 'id');
    }
}

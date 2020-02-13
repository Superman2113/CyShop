<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 用户购物车
 * @package App\Models
 */
class UserCartsModel extends Model
{
    protected $table = 'user_carts';

    protected $fillable = ['goods_id', 'user_id', 'num'];

    /**
     * 关联用户
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(UserCollectModel::class, 'user_id', 'id');
    }

    /**
     * 关联商品
     * @return BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(GoodsModel::class, 'goods_id', 'id');
    }
}

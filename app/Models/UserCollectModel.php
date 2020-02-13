<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\Models\User;

/**
 * 用户收藏表
 * @package App\Models
 */
class UserCollectModel extends Model
{
    protected $table = "user_collect";


    /**
     * @return BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(GoodsModel::class, 'goods_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

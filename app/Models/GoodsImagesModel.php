<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GoodsImagesModel extends Model
{
    protected $table = 'goods_images';


    /**
     * 图片对应商品
     * @return BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(GoodsModel::class, 'goods_id', 'id');
    }
}

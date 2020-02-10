<?php

namespace App\Models;

use App\Codes\GoodsImagesCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GoodsModel extends Model
{
    protected $table = 'goods';


    protected $fillable = [
        'goods_name', 'brand_name', 'price', 'is_sale', 'brand_id'
    ];

    /**
     * 商品图片
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(GoodsImagesCode::class, 'goods_id', 'id');
    }
}

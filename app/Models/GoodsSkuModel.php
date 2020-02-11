<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\GoodsSkuModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $goods_id 商品ID
 * @property string $title 规格名称
 * @property int $num SKU库存
 * @property int $price 商品售价
 * @property string|null $properties 商品属性表ID，以逗号分隔
 * @property string $bar_code 条码
 * @property string $goods_code 商品码
 * @property int $status 状态:1启用,0禁用
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereBarCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereGoodsCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsSkuModel whereUpdatedAt($value)
 * @property-read GoodsModel $goods
 */
class GoodsSkuModel extends Model
{
    protected $table = 'goods_sku';

    protected $fillable = [
        'title','goods_id', 'num', 'price', 'properties', 'bar_code', 'status', 'goods_code'
    ];
    /**
     * 关联商品
     * @return BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(GoodsModel::class, 'goods_id', 'id');
    }
}

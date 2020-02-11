<?php

namespace App\Models;

use App\Codes\GoodsImagesCode;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\GoodsModel
 *
 * @property int $id
 * @property string $goods_name 商品名称
 * @property string $brand_name 品牌名称
 * @property int $brand_id 品牌ID
 * @property int $price
 * @property int $original 商品原价
 * @property string $tags 商品标签
 * @property string $content 商品内容
 * @property string $summary 商品描述
 * @property int $is_sale 上架状态: 1是0是
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereIsSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoodsImagesModel[] $imgs
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoodsSkuModel[] $sku
 * @property-read int|null $sku_count
 * @property int $cate_id 分类ID
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsModel whereCateId($value)
 */
class GoodsModel extends Model
{
    protected $table = 'goods';


    /**
     * 商品图片
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(GoodsImagesModel::class, 'goods_id', 'id');
    }


    /**
     * 商品规格库存
     * @return HasMany
     */
    public function sku()
    {
        return $this->hasMany(GoodsSkuModel::class, 'goods_id', 'id');
    }

    /**
     * 商品分类
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoriesModel::class, 'cate_id', 'id');
    }

    /**
     * 商品品牌
     * @return BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(BrandModel::class, 'brand_id', 'id');
    }

    public function property()
    {
        return $this->hasMany(GoodsPropertyModel::class, 'goods_id', 'id');
    }

}

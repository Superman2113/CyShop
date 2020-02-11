<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\GoodsImagesModel
 *
 * @property int $id
 * @property int $goods_id 商品ID
 * @property string $link 图片URL地址
 * @property int $position 图片位置
 * @property int $is_master 是否主图: 1是,0否
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GoodsModel $goods
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel whereIsMaster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsImagesModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GoodsImagesModel extends Model
{
    protected $table = 'goods_images';


    protected $fillable = ['link', 'is_master', 'position', 'goods_id'];

    /**
     * 图片对应商品
     * @return BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(GoodsModel::class, 'goods_id', 'id');
    }
}

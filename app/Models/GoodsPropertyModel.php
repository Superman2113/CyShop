<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\GoodsPropertyModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $goods_id 商品ID
 * @property int $prop_name_id 属性名ID
 * @property int $prop_value_id 属性值ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel wherePropNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel wherePropValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GoodsPropertyModel whereUpdatedAt($value)
 * @property-read GoodsModel $goods
 */
class GoodsPropertyModel extends Model
{
    protected $table = 'goods_property';


    protected $fillable = [
        'goods_id', 'prop_name_id', 'prop_value_id'
    ];

    /**
     * 关联商品
     * @return BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(GoodsModel::class,  'goods_id', 'id');
    }

}

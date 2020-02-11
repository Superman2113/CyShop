<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 商品属性名
 * Class PropertyNameModel
 *
 * @package App\Models
 * @property int $id
 * @property string $title 属性名
 * @property int $cate_id 分类ID
 * @property int $is_allow_alias 是否允许别名: 1是0否
 * @property int $is_color 是否颜色属性: 1是0否
 * @property int $is_enum 是否枚举: 1是0否
 * @property int $is_input 是否输入属性: 1是0否
 * @property int $is_key 是否关键属性: 1是0否
 * @property int $is_sale 是否销售属性:1是0否
 * @property int $is_search 是否搜索字段: 1是0否
 * @property int $is_must 是否必须属性: 1是0否
 * @property int $is_multi 是否多选: 1是0否
 * @property int $status 状态: 1启用,0禁用
 * @property int $sort 排序字段
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoriesModel $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PropertyValueModel[] $property_values
 * @property-read int|null $property_values_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsAllowAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsEnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsInput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsMulti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsMust($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereIsSearch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyNameModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PropertyNameModel extends Model
{
    protected $table = 'property_name';


    /**
     * 属性名对应分类
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoriesModel::class, 'cate_id', 'id');
    }


    /**
     * 属性值
     * @return HasMany
     */
    public function property_values()
    {
        return $this->hasMany(PropertyValueModel::class, 'prop_name_id', 'id');
    }

}

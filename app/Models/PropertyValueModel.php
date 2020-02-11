<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * 属性值表
 * Class PropertyValueModel
 *
 * @package App\Models
 * @property int $id
 * @property string $title 属性值名称
 * @property int $prop_name_id 属性名ID
 * @property int $cate_id 分类ID
 * @property int $status 属性值状态:1启用0禁用
 * @property int $sort 排序字段
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read PropertyNameModel $property_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel whereCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel wherePropNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValueModel whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read CategoriesModel $category
 */
class PropertyValueModel extends Model
{
    protected $table = 'property_value';


    /**
     * 对应的属性名
     * @return BelongsTo
     */
    public function property_name()
    {
        return $this->belongsTo(PropertyNameModel::class, 'prop_name_id', 'id');
    }


    /**
     * 分类
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoriesModel::class, 'cate_id', 'id');
    }
}

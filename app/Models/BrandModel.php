<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BrandModel
 *
 * @property int $id
 * @property int $cate_id 分类ID
 * @property string $brand_name
 * @property string $desc 品牌描述
 * @property int $sort 排序字段
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoriesModel $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel whereCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BrandModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BrandModel extends Model
{
    protected $table = 'brand';

    // 该品牌所属分类
    public function category()
    {
        return $this->belongsTo(CategoriesModel::class, 'cate_id', 'id');
    }
}
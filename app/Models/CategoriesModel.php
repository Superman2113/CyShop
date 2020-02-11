<?php


namespace App\Models;


use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoriesModel
 *
 * @property int $id
 * @property int $pid 父级分类ID，0为顶级分类
 * @property string $cate_name 分类名称
 * @property int $sort 排序字段
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BrandModel[] $brand
 * @property-read int|null $brand_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CategoriesModel[] $child
 * @property-read int|null $child_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CategoriesModel[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\CategoriesModel $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel whereCateName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoriesModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoriesModel extends Model
{
    use ModelTree, AdminBuilder;  // 使用laravel-admin 的 tree

    protected $table = 'categories';

    protected $fillable = ['pid', 'cate_name', 'sort'];

    protected $with = [
        'parent'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('pid'); // 设置父类ID的字段名称
        $this->setOrderColumn('sort'); // 设置排序字段名称
        $this->setTitleColumn('cate_name'); // 设置标题名称
    }


    // 该分类下的品牌
    public function brand()
    {
        return $this->hasMany(BrandModel::class, 'cate_id', $this->getKeyName());
    }


    /**
     * 该分类的子分类
     */
    public function child()
    {
        return $this->hasMany(get_class($this), 'pid', $this->getKeyName());
    }

    /**
     * 该分类的父分类
     */
    public function parent()
    {
        return $this->hasOne(get_class($this), $this->getKeyName(), 'pid');
    }
}
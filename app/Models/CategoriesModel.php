<?php


namespace App\Models;


use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

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
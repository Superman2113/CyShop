<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';

    protected $fillable = ['pid', 'cate_name', 'sort'];

    protected $with = [
        'parent'
    ];

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
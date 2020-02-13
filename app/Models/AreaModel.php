<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table = 'area';


    use ModelTree, AdminBuilder;  // 使用laravel-admin 的 tree

    protected $fillable = ['pid', 'name', 'sort', 'code'];

    protected $with = [
        'parent'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('pid'); // 设置父类ID的字段名称
        $this->setOrderColumn('sort'); // 设置排序字段名称
        $this->setTitleColumn('name'); // 设置标题名称
    }

    /**
     * 该地区的子地区
     */
    public function child()
    {
        return $this->hasMany(get_class($this), 'pid', $this->getKeyName());
    }

    /**
     * 该地区的父地区
     */
    public function parent()
    {
        return $this->hasOne(get_class($this), $this->getKeyName(), 'pid');
    }
}

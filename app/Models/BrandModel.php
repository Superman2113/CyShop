<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table = 'brand';

    // 该品牌所属分类
    public function category()
    {
        return $this->belongsTo(CategoriesModel::class, 'cate_id', 'id');
    }
}
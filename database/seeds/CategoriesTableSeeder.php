<?php

use Illuminate\Database\Seeder;
use App\Models\CategoriesModel;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriesModel::truncate();
        CategoriesModel::insert([
            [
                'id' => 1,
                'pid' => 0,
                'cate_name' => '服装',
                'sort'     => 1,
            ],  // 1
            [
                'id' => 2,
                'pid' => 1,
                'cate_name' => '男装',
                'sort'     => 2,
            ], // 2
            [
                'id' => 3,
                'pid' => 1,
                'cate_name' => '女装',
                'sort'     => 3,
            ], // 3
            [
                'id' => 4,
                'pid' => 1,
                'cate_name' => '内衣',
                'sort'     => 4,
            ], // 4
            [
                'id' => 5,
                'pid' => 2,
                'cate_name' => '休闲裤',
                'sort'     => 5,
            ], // 5
            [
                'id' => 6,
                'pid' => 3,
                'cate_name' => '半身裙',
                'sort'     => 6,
            ], // 6
            [
                'id' => 7,
                'pid' => 4,
                'cate_name' => '真丝睡衣',
                'sort'     => 7,
            ], // 7
            [
                'id' => 8,
                'pid' => 0,
                'cate_name' => '电子产品',
                'sort'     => 8,
            ], // 8
            [
                'id' => 9,
                'pid' => 8,
                'cate_name' => '家电',
                'sort' => 9
            ], // 9
            [
                'id' => 10,
                'pid' => 8,
                'cate_name' => '手机',
                'sort' => 10
            ], // 10

            [
                'id' => 11,
                'pid' => 0,
                'cate_name' => '家纺家具',
                'sort' => 11,
            ],

            [
                'id' => 12,
                'pid' => 11,
                'cate_name' => '家具',
                'sort'  => 12
            ],

            [
                'id' => 13,
                'pid' => 0,
                'cate_name' => '汽车',
                'sort' => 13
            ],
            [
                'id' => 14,
                'pid' => 13,
                'cate_name' => '二手车',
                'sort' => 14
            ],
            [
                'id' => 15,
                'pid' => 0,
                'cate_name' => '箱包鞋子',
                'sort' => 15
            ],
            [
                'id' => 16,
                'pid' => 15,
                'cate_name' => '鞋子',
                'sort' => 16
            ],
            [
                'id' => 17,
                'pid' => 16,
                'cate_name' => '板鞋',
                'sort' => 17
            ],
            [
                'id' => 18,
                'pid' => 16,
                'cate_name' => '跑鞋',
                'sort' => 18
            ]
        ]);
    }
}

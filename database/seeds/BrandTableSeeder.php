<?php

use Illuminate\Database\Seeder;
use App\Models\BrandModel;


class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandModel::truncate();
        BrandModel::insert([
            [
                'cate_id' => 2,
                'brand_name' => '花花公子',
                'desc' => '',
                'sort' => 1,
            ],
            [
                'cate_id' => 2,
                'brand_name' => '李宁',
                'desc' => '',
                'sort' => 2,
            ],
            [
                'cate_id' => 16,
                'brand_name' => '李宁',
                'desc' => '',
                'sort' => 3
            ]
        ]);
    }
}

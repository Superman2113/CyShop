<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name', 100)->comment('商品名称');
            $table->string('brand_name', 100)->comment('品牌名称');
            $table->unsignedInteger('brand_id')->comment('品牌ID');
            $table->decimal('price', 20, 2)->commnet('商品参考价');
            $table->tinyInteger('is_sale')->defalut(\App\Codes\GoodsStatusCode::ON_SALE)->comment('上架状态: 1是0是');
            $table->timestamps();

            $table->foreign('brand_id') // 外键关联
                ->references('id')
                ->on('brand')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}

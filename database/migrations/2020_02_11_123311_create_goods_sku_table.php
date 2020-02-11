<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_sku', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->comment('商品ID');
            $table->string('title', 100)->comment('规格名称');
            $table->unsignedInteger('num')->comment('SKU库存');
            $table->unsignedBigInteger('price')->comment('商品售价');
            $table->string('properties', 255)->nullable()->comment('商品属性表ID，以逗号分隔');
            $table->string('bar_code', 50)->default('')->comment('条码');
            $table->string('goods_code', 100)->default('')->comment('商品码');
            $table->tinyInteger('status')->default(\App\Codes\BoolCode::IS_TRUE)->comment('状态:1启用,0禁用');
            $table->timestamps();
            $table->foreign('goods_id') // 外键关联
            ->references('id')
                ->on('goods')
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
        Schema::dropIfExists('goods_sku');
    }
}

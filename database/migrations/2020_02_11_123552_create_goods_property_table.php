<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 商品属性表
 * Class CreateGoodsPropertyTable
 */
class CreateGoodsPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_property', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->comment('商品ID');
            $table->unsignedInteger('prop_name_id')->comment('属性名ID');
            $table->unsignedInteger('prop_value_id')->comment('属性值ID');
            $table->timestamps();

            $table->foreign('prop_name_id') // 属性名外键关联
            ->references('id')
                ->on('property_name')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('prop_value_id') // 属性值外键关联
            ->references('id')
                ->on('property_value')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('goods_id') // 商品表外键关联
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
        Schema::dropIfExists('goods_property');
    }
}

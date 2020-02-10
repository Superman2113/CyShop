<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->comment('商品ID');
            $table->string('link', 250)->comment('图片URL地址');
            $table->unsignedSmallInteger('position')->comment('图片位置');
            $table->tinyInteger('is_master')->default(\App\Codes\GoodsImagesCode::IS_NOT_MASTER)->comment('是否主图: 1是,0否');
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
        Schema::dropIfExists('goods_images');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cate_id')->comment('分类ID');
            $table->string('brand_name', 50)->commnet('品牌名称');
            $table->string('desc', 100)->default('')->comment('品牌描述');
            $table->unsignedInteger('sort')->default(99)->comment('排序字段');
            $table->timestamps();


            $table->foreign('cate_id') // 外键关联
            ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('brand');
    }
}

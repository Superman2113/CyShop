<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_value', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->comment('属性值名称');
            $table->unsignedInteger('prop_name_id')->comment('属性名ID');
            $table->unsignedInteger('cate_id')->comment('分类ID');
            $table->tinyInteger('status')->default(\App\Codes\BoolCode::IS_FALSE)->comment('属性值状态:1启用0禁用');
            $table->unsignedSmallInteger('sort')->default(99)->comment('排序字段');
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
        Schema::dropIfExists('property_value');
    }
}

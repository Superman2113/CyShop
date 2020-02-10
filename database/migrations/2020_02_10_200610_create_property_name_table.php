<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Codes\BoolCode;

class CreatePropertyNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_name', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->comment('属性名');
            $table->unsignedInteger('cate_id')->comment('分类ID');
            $table->tinyInteger('is_allow_alias')->default(BoolCode::IS_FALSE)->comment('是否允许别名: 1是0否');
            $table->tinyInteger('is_color')->default(BoolCode::IS_FALSE)->comment('是否颜色属性: 1是0否');
            $table->tinyInteger('is_enum')->default(BoolCode::IS_FALSE)->comment('是否枚举: 1是0否');
            $table->tinyInteger('is_input')->default(BoolCode::IS_FALSE)->comment('是否输入属性: 1是0否');
            $table->tinyInteger('is_key')->default(BoolCode::IS_FALSE)->comment('是否关键属性: 1是0否');
            $table->tinyInteger('is_sale')->default(BoolCode::IS_FALSE)->comment('是否销售属性:1是0否');
            $table->tinyInteger('is_search')->default(BoolCode::IS_FALSE)->comment('是否搜索字段: 1是0否');
            $table->tinyInteger('is_must')->default(BoolCode::IS_FALSE)->comment('是否必须属性: 1是0否');
            $table->tinyInteger('is_multi')->default(BoolCode::IS_FALSE)->comment('是否多选: 1是0否');
            $table->tinyInteger('status')->default(BoolCode::IS_FALSE)->comment('状态: 1启用,0禁用');
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
        Schema::dropIfExists('property_name');
    }
}

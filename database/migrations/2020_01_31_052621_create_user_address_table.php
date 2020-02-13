<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * 用户收货地址表
 * Class CreateUserAddressTable
 */
class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedInteger('province')->comment('地区表中的省份ID');
            $table->unsignedInteger('city')->comment('地区表中的城市ID');
            $table->unsignedInteger('district')->comment('地区表中的区ID');
            $table->string('address')->comment('详细地址');
            $table->unsignedInteger('zip')->comment('邮政编码');
            $table->tinyInteger('is_default')->defalut(0)->comment('是否默认收货地址');
            $table->timestamps();
            $table->foreign('user_id') // 外键关联
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('province') // 外键关联
            ->references('id')
                ->on('area')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('city') // 外键关联
            ->references('id')
                ->on('area')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('district') // 外键关联
            ->references('id')
                ->on('area')
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
        Schema::dropIfExists('user_address');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * 用户登录日志表
 */
class CreateUserLoginLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedInteger('login_ip')->comment('登录IP'); // 使用无符号的32位int保存ip地址。
            $table->timestamp('login_time')->comment('登录时间');
            $table->tinyInteger('login_status')->comment('登录状态1登录成功, 0登录失败');

            $table->foreign('user_id') // 外键关联
                ->references('id')
                ->on('users')
                ->ondelete('cascade')
                ->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_login_log');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


// 用户登录表
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('登录名');
            $table->string('password', 191)->comment('登录密码md5加密');
            $table->tinyInteger('status')->default(\App\Models\UsersModel::USER_STATUS_ON)->comment('账号状态: 1 启用 0 禁用');
            $table->rememberToken()->comment('登录凭证');
            $table->timestamps();
            $table->index('name', 'index_name', 'btree');  // 索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

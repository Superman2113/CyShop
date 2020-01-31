<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// 用户详情表
class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->string('nickname', 30)->comment('用户昵称');
            $table->string('avatar', 100)->default('')->comment('用户头像');
            $table->string('point')->default(0)->comment('用户积分');
            $table->tinyInteger('sex')->default(\App\Models\UserInfoModel::SEX_SECRET)->comment('用户性别:0保密,1男,2女');
            $table->string('mobile', 11)->default('')->comment('用户手机号');
            $table->string('truename', 30)->default('')->comment('用户真实姓名');
            $table->timestamp('birthday')->nullable()->comment('会员生日');
            $table->string('email')->default('')->comment('邮箱');
            $table->boolean('email_verified')->default(false)->comment('邮箱是否已验证');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->timestamp('registered_time')->nullable()->comment('注册时间');

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
        Schema::dropIfExists('user_info');
    }
}

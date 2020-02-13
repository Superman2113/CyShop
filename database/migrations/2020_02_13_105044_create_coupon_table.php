<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->comment('优惠券名称');
            $table->unsignedInteger('money')->comment('优惠金额');
            $table->tinyInteger('coupon_type')->default(\App\Codes\CouponCode::COUPON_FULL_CAT)->comment('优惠券类型');
            $table->tinyInteger('discount')->default(0)->comment('折数');
            $table->unsignedInteger('min_order_money')->default(100)->commen('可用最小金额');
            $table->unsignedInteger('coupon_num')->defalut(0)->comment('优惠券数量');
            $table->date('send_start_date')->comment('领取开始时间');
            $table->date('send_end_date')->comment('领取结束时间');
            $table->date('use_start_date')->comment('优惠券可以使用的开始时间');
            $table->date('use_end_date')->comment('过期时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon');
    }
}

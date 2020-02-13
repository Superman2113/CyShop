<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_master', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedBigInteger('order_no')->comment('订单编号');
            $table->string('shipping_user', 30)->comment('收货人姓名');
            $table->integer('address_id')->comment('用户收获地址表ID');
            $table->unsignedTinyInteger('payment_method')->default(\App\Codes\PaymentCode::PAY_WECHAT)->comment('支付方式');
            $table->unsignedInteger('order_money')->comment('订单金额');
            $table->unsignedInteger('district_money')->comment('运费金额');
            $table->unsignedInteger('shipping_money')->comment('优惠金额');
            $table->unsignedInteger('pay_money')->comment('支付金额');
            $table->string('shipping_comp_name', 10)->default('')->comment('快递公司名称');
            $table->string('shipping_no')->default('')->comment('快递单号');
            $table->dateTime('order_time')->nullable()->comment('下单时间');
            $table->dateTime('shipping_time')->nullable()->comment('发货时间');
            $table->dateTime('pay_time')->nullalbe()->comment('支付时间');
            $table->dateTime('receive_time')->nullable()->comment('收货时间');
            $table->tinyInteger('order_status')->default(0)->comment('订单状态');
            $table->unsignedInteger('order_point')->default(0)->comment('订单积分');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('order_master');
    }
}

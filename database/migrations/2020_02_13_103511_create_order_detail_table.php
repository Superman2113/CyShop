<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->comment('订单主表ID');
            $table->unsignedInteger('goods_id')->comment('商品ID');
            $table->unsignedInteger('buy_num')->comment('购买商品数量');
            $table->unsignedInteger('single_price')->comment('购买商品单价');
            $table->unsignedInteger('average_cost')->comment('平均成本价格');
            $table->unsignedInteger('fee_money')->comment('优惠分摊金额');
            $table->timestamps();
            //
            $table->foreign('order_id')
                ->references('id')
                ->on('order_master')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('goods_id')
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
        Schema::dropIfExists('order_detail');
    }
}

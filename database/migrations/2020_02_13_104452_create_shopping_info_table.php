<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ship_name', 20)->comment('公司名称');
            $table->string('ship_contact', 20)->comment('物流公司联系人');
            $table->string('ship_phone', 20)->comment('物流公司联系电话');
            $table->unsignedInteger('price')->comment('配送价格');
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
        Schema::dropIfExists('shipping_info');
    }
}

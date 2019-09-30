<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('coupon_id');
            $table->integer('price_total');
            $table->string('name_receive');
            $table->string('phone_receive');
            $table->string('address_receive');
            $table->enum('payment_status', ['已付款', '未付款'])->nullable()->default('未付款');
            $table->enum('status', ['正常', '作廢'])->nullable()->default('正常');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('member')->onDelete('restrict');
            $table->foreign('coupon_id')->references('id')->on('coupon')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table)
        {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['coupon_id']);
        });

        Schema::dropIfExists('order');
    }
}

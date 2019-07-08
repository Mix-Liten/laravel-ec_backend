<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('cart_id');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('restrict');
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_cart', function (Blueprint $table)
        {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['cart_id']);
        });

        Schema::dropIfExists('member_cart');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cart', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->unsignedInteger('user_id')->default(0)->comment('供应商编码');
            $table->unsignedInteger('goods_id')->default(0)->comment('商品编号');
            $table->string('goods_image', 128)->default('')->comment('商品图片');
            $table->unsignedInteger('price')->default(0)->comment('单价');
            $table->unsignedSmallInteger('number')->default(0)->comment('数量');
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
        Schema::dropIfExists('order_cart');
    }
}

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
            $table->increments('order_detail_id');
            $table->unsignedInteger('order_id')->default(0)->comment('订单编号');
            $table->unsignedInteger('goods_attr_id')->default(0)->comment('订单商品ID');
            $table->string('goods_name', 32)->default('')->comment('商品名称');
            $table->string('goods_image', 128)->default('')->comment('商品图片');
            $table->unsignedSmallInteger('number')->default(0)->comment('购买数量');
            $table->unsignedInteger('price')->default(0)->comment('单价');
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
        Schema::dropIfExists('order_detail');
    }
}

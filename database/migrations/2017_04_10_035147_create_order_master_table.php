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
            $table->increments('order_id');
            $table->unsignedBigInteger('order_sn')->default(0)->comment('订单编号 yyyymmddnnnnnnnn');
            $table->unsignedInteger('ship_id')->default(0)->comment('编号');
            $table->unsignedInteger('user_id')->default(0)->comment('下单人编号');
            $table->string('user_name', 128)->default('')->comment('下单人名称');
            $table->unsignedTinyInteger('order_state')->default(0)->comment('订单状态。1：未付款；2：已付款；3：已完成；4：评价，5：退款');
            $table->unsignedTinyInteger('order_status')->default(0)->comment('订单当前状态。1：取消订单；2：未付款；3：已付款；4：已发货；5：已收货；6:已评价');
            $table->unsignedTinyInteger('payment_method')->default(0)->comment('支付方式:1支付宝,2微信');
            $table->unsignedInteger('order_money')->default(0)->comment('订单金额');
            $table->unsignedInteger('district_money')->default(0)->comment('优惠金额');
            $table->unsignedInteger('shipping_money')->default(0)->comment('运费金额');
            $table->unsignedInteger('payment_money')->default(0)->comment('支付金额');
            $table->timestamp('created_at')->comment('下单时间');
            $table->timestamp('pay_time')->comment('支付时间');
            $table->timestamp('shipping_time')->comment('发货时间');
            $table->timestamp('receive_time')->comment('收货时间');
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

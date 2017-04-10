<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderUserAddrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_user_addr', function (Blueprint $table) {
            $table->increments('user_addr_id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户编号');
            $table->unsignedInteger('province_id')->default(0)->comment('省级id');
            $table->string('province_name', 32)->default('')->comment('省级名称');
            $table->unsignedInteger('city_id')->default(0)->comment('市级id');
            $table->string('city_name', 32)->default('')->comment('市级名称');
            $table->unsignedInteger('district_id')->default(0)->comment('县镇级id');
            $table->string('district_name', 32)->default('')->comment('县镇名称');
            $table->unsignedSmallInteger('zip')->default(0)->comment('邮编');
            $table->unsignedBigInteger('mobile_phone')->default(0)->comment('手机号码');
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
        Schema::dropIfExists('order_user_addr');
    }
}

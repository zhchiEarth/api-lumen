<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_info', function (Blueprint $table) {
            $table->increments('ship_id');
            $table->string('ship_name', 32)->default('')->comment('物流名称');
            $table->string('ship_number', 32)->default('')->comment('物流公司名称');
            $table->unsignedTinyInteger('ischeck')->default(0)->comment('查询结果状态： 0：在途,1：揽件,2：疑难,3.签收');
            $table->unsignedTinyInteger('state')->default(0)->comment('快递单当前的状态 ：0在途中、1已揽收、2疑难、3已签收、4退签、5同城派送中、6退回、7转单');
            $table->string('context', 256)->default('')->comment('快递内容(json格式)');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBalanceLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_balance_log', function (Blueprint $table) {
            $table->increments('balance_id');
            $table->unsignedInteger('user_id')->default(0)->comment('供应商编码');
            $table->unsignedTinyInteger('source')->default(0)->comment('记录来源:1订单,2退货单');
            $table->unsignedInteger('source_sn')->default(0)->comment('相关单据ID');
            $table->unsignedInteger('amount')->default(0)->comment('变动金额');
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
        Schema::dropIfExists('user_balance_log');
    }
}

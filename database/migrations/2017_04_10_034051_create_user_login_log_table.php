<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login', function (Blueprint $table) {
            $table->smallIncrements('login_id');
            $table->unsignedInteger('user_name')->default(0)->comment('用户编号');
            $table->unsignedInteger('login_ip')->default(0)->comment('登录ip');
            $table->unsignedTinyInteger('login_type')->default(0)->comment('登录类型:0未成功 1成功');
            $table->timestamp('login_time')->comment('登录时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_login');
    }
}

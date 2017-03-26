<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->unsignedBigInteger('mobile_phone')->default(0)->comment('手机号码');
            $table->string('email', 64)->default('')->comment('邮箱');
            $table->string('nickname', 128)->default('')->comment('用户昵称');
            $table->string('password', 128)->default('')->comment('密码');
            $table->string('avatar', 256)->default('')->comment('头像');
            $table->unsignedTinyInteger('gender')->default(0)->comment('性别0未知1男2女');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态0禁用1启用');
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
        Schema::dropIfExists('users');
    }
}

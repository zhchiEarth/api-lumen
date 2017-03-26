<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_pics', function (Blueprint $table) {
            $table->increments('pic_id');
            $table->unsignedInteger('goods_id')->default(0)->comment('商品ID');
            $table->string('pic_desc', 128)->default('')->comment('');
            $table->string('pic_url', 256)->default('')->comment('图片URL');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态');
            $table->unsignedTinyInteger('weight')->default(0)->comment('权重');
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
        Schema::dropIfExists('goods_pics');
    }
}

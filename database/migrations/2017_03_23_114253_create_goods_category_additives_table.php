<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategoryAdditivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_category_additives', function (Blueprint $table) {
            $table->mediumIncrements('additive_id');
            $table->unsignedMediumInteger('category_id')->default(0)->comment('属性分类id,关联属性表');
            $table->string('additive_name', 128)->default('')->comment('属性名称');
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
        Schema::dropIfExists('goods_category_additives');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategoryAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_category_attributes', function (Blueprint $table) {
            $table->mediumIncrements('attr_id');
            $table->unsignedMediumInteger('category_id')->default(0)->comment('分类编号');
            $table->string('attr_name', 128)->default('')->comment('属性名称');
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
        Schema::dropIfExists('goods_category_attributes');
    }
}

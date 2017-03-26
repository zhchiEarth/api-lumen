<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_attr', function (Blueprint $table) {
            $table->increments('goods_attr_id');
            $table->unsignedInteger('goods_id')->default(0)->comment('商品id');
            $table->string('attribute_key')->default('')->comment('属性规格id');
            $table->string('attribute_value')->default('')->comment('属性规格全称');
            $table->unsignedInteger('market_price')->default(0)->comment('市场价');
            $table->unsignedInteger('shop_price')->default(0)->comment('销售价');
            $table->unsignedInteger('supplier_price')->default(0)->comment('供应价');
            $table->unsignedInteger('goods_num')->default(0)->comment('库存');
            $table->decimal('weight', 5, 2)->default(0)->comment('重量');
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
        Schema::dropIfExists('goods_attr');
    }
}

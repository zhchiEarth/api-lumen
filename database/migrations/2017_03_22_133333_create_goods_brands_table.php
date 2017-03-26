<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_brands', function (Blueprint $table) {
            $table->smallIncrements('brand_id');
            $table->string('brand_name', 64)->default('')->comment('品牌名称');
            $table->string('telephone', 128)->default('')->comment('联系电话');
            $table->string('brand_web', 128)->default('')->comment('品牌网站');
            $table->string('brand_logo', 128)->default('')->comment('品牌logo URL');
            $table->string('brand_desc', 128)->default('')->comment('品牌描述');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态0禁用1启用');
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
        Schema::dropIfExists('goods_brands');
    }
}

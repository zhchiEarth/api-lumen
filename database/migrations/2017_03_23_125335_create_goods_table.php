<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('goods_id');
            $table->unsignedInteger('goods_code')->default(0)->comment('商品编码');
            $table->string('goods_name', 128)->default('')->comment('商品名称');
            $table->unsignedInteger('user_id')->default(0)->comment('供应商编码');
            $table->unsignedMediumInteger('one_category_id')->default(0)->comment('一级分类id');
            $table->unsignedMediumInteger('two_category_id')->default(0)->comment('二级分类id');
            $table->unsignedMediumInteger('brand_id')->default(0)->comment('品牌id');
            $table->unsignedInteger('price_min')->comment('最低价格');
            $table->unsignedInteger('price_max')->comment('最高价格');
            $table->unsignedMediumInteger('goods_num')->comment('商品数量');
            $table->unsignedTinyInteger('audit_status')->default(0)->comment('0未审核,1已审核');
            $table->unsignedMediumInteger('sale_count')->default(0)->comment('销售总量');
            $table->unsignedMediumInteger('view_count')->default(0)->comment('浏览量');
            $table->unsignedMediumInteger('comment_count')->default(0)->comment('评论总数');
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
        Schema::dropIfExists('goods');
    }
}

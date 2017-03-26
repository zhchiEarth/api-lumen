<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_categories', function (Blueprint $table) {
            $table->smallIncrements('category_id');
            $table->string('category_name', 10)->default('')->comment('分类名称');
            $table->unsignedInteger('category_code')->default(0)->comment('分类编码');
            $table->string('category_logo', 128)->default('')->comment('品牌logo URL');
            $table->unsignedSmallInteger('parent_id')->default(0)->comment('是否显示0不显示1显示');
            $table->unsignedTinyInteger('level')->default(0)->comment('分类层级');
            $table->unsignedTinyInteger('status')->default(0)->comment('分类状态0禁用1启用');
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
        Schema::dropIfExists('goods_categories');
    }
}

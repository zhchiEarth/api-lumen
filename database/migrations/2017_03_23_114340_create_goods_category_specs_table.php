<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategorySpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_category_specs', function (Blueprint $table) {
            $table->mediumIncrements('spec_id');
            $table->unsignedMediumInteger('attr_id')->default(0)->comment('属性编号');
            $table->string('attribute_value', 128)->default('')->comment('附加值');
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
        Schema::dropIfExists('goods_category_specs');
    }
}

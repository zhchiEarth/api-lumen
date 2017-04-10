<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region', function (Blueprint $table) {
            $table->increments('region_id');
            $table->string('region_name')->default('')->comment('名称');
            $table->string('province_name')->default('')->comment('省份名称');
            $table->string('city_name')->default('')->comment('城市名');
            $table->unsignedInteger('parent_id')->default(0)->comment('父级序号');
            $table->unsignedTinyInteger('region_level')->default(0)->comment('1,省.2,市.3,区');
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
        Schema::dropIfExists('region');
    }
}

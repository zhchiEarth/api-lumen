<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsAttr;

class GoodsAttrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goodsAttr = factory(GoodsAttr::class)->times(100)->make();
        GoodsAttr::insert($goodsAttr->toArray());
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsCategory;

class GoodsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goodsCategory = factory(GoodsCategory::class)->times(100)->make();
        GoodsCategory::insert($goodsCategory->toArray());
    }
}

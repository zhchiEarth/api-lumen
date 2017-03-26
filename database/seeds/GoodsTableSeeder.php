<?php

use Illuminate\Database\Seeder;
use App\Models\Goods;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goods = factory(Goods::class)->times(1000)->make();
        Goods::insert($goods->toArray());
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsCategoryAttribute;

class GoodsCategoryAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goodsCategoryAttribute = factory(GoodsCategoryAttribute::class)->times(100)->make();
        GoodsCategoryAttribute::insert($goodsCategoryAttribute->toArray());
    }
}

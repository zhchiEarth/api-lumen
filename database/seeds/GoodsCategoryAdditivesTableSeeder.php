<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsCategoryAdditive;

class GoodsCategoryAdditivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $godsCategoryAdditive = factory(GoodsCategoryAdditive::class)->times(1000)->make();
        GoodsCategoryAdditive::insert($godsCategoryAdditive->toArray());
    }
}

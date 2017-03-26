<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsCategorySpec;

class GoodsCategorySpecsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goodsCategorySpec = factory(GoodsCategorySpec::class)->times(1000)->make();
        GoodsCategorySpec::insert($goodsCategorySpec->toArray());
    }
}

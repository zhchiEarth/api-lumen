<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsBrand;

class GoodsBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goodsBrand = factory(GoodsBrand::class)->times(100)->make();
        GoodsBrand::insert($goodsBrand->toArray());
    }
}

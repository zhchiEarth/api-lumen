<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsPic;

class GoodsPicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goodsPic = factory(GoodsPic::class)->times(10000)->make();
        GoodsPic::insert($goodsPic->toArray());
    }
}

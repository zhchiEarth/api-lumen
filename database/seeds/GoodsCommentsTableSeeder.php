<?php

use Illuminate\Database\Seeder;
use App\Models\GoodsComment;

class GoodsCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $godsComment = factory(GoodsComment::class)->times(10000)->make();
        GoodsComment::insert($godsComment->toArray());
    }
}

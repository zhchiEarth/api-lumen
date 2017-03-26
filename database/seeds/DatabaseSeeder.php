<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
//        $this->call('GoodsAttrTableSeeder');
        $this->call('GoodsBrandsTableSeeder');
        $this->call('GoodsCategoriesTableSeeder');
        $this->call('GoodsCategoryAdditivesTableSeeder');
        $this->call('GoodsCategoryAttributesTableSeeder');
        $this->call('GoodsCategorySpecsTableSeeder');
        $this->call('GoodsCommentsTableSeeder');
        $this->call('GoodsPicsTableSeeder');
        $this->call('GoodsTableSeeder');
    }
}

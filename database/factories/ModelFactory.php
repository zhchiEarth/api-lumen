<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

function randDate()
{
    return \Carbon\Carbon::now()
        ->subDays(rand(1, 100))
        ->subHours(rand(1, 23))
        ->subMinutes(rand(1, 60));
}

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'mobile_phone' => $faker->name,
        'email' => $faker->safeEmail,
        'nickname' => $faker->name,
        'password' => app('hash')->make(123456),
        'avatar' => $faker->imageUrl($width = 40, $height = 40),
        'gender' => $faker->numberBetween(0, 2),
        'status' => $faker->numberBetween(0,1),
        'created_at' => randDate()
    ];
});

$factory->define(App\Models\Goods::class, function (Faker\Generator $faker) {
    return [
        'goods_code' => $faker->randomNumber(),
        'user_id' => $faker->numberBetween(1, 10),
        'one_category_id' => $faker->numberBetween(1,5),
        'two_category_id' => $faker->numberBetween(6,50),
        'brand_id' => $faker->numberBetween(1,50),
        'price' => $faker->numberBetween(200,50000),
        'audit_status' => $faker->numberBetween(0,1),
        'sale_count' => $faker->numberBetween(100,5000),
        'view_count' => $faker->numberBetween(100,5000),
        'comment_count' => $faker->numberBetween(100,5000),
        'created_at' => randDate()
    ];
});

$factory->define(App\Models\GoodsPic::class, function (Faker\Generator $faker) {
    return [
        'goods_id' => $faker->numberBetween(1,1000),
        'pic_desc' => $faker->sentence(),
        'pic_url'  => $faker->imageUrl(),
        'status'   => $faker->numberBetween(0,1),
        'weight'   => $faker->numberBetween(0,127)
    ];
});

$factory->define(App\Models\GoodsComment::class, function (Faker\Generator $faker) {
    return [
        'goods_id' => $faker->numberBetween(1,1000),
        'order_id' => $faker->numberBetween(1,10),
        'user_id'  => $faker->numberBetween(1,10),
        'title'    => $faker->sentence(mt_rand(3,10)),
        'content'  => $faker->text(),
        'status'   => $faker->numberBetween(0,1)
    ];
});

$factory->define(App\Models\GoodsCategorySpec::class, function (Faker\Generator $faker) {
    return [
        'attr_id' => $faker->numberBetween(1, 100),
        'attribute_value' => $faker->word
    ];
});

$factory->define(App\Models\GoodsCategoryAttribute::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 100),
        'attr_name'   => $faker->word
    ];
});

$factory->define(App\Models\GoodsCategoryAdditive::class, function(Faker\Generator $faker) {
    return [
        'category_id'   => $faker->numberBetween(1, 100),
        'additive_name' => $faker->word
    ];
});

$factory->define(App\Models\GoodsCategory::class, function (Faker\Generator $faker) {
    return [
        'category_name' => $faker->word,
        'category_code' => $faker->randomNumber(),
        'category_logo' => $faker->imageUrl(),
        'parent_id'     => $faker->numberBetween(1,3),
        'level'         => $faker->numberBetween(1,2),
        'status'        => $faker->numberBetween(0,1)
    ];
});

$factory->define(App\Models\GoodsBrand::class, function (Faker\Generator $faker) {
    return [
        'brand_name' => $faker->word,
        'telephone'  => $faker->randomNumber(),
        'brand_web'  => $faker->url,
        'brand_logo' => $faker->imageUrl(),
        'brand_desc' => $faker->numberBetween(1,3),
        'status'     => $faker->numberBetween(0,1),
        'weight'     => $faker->numberBetween(1,127)
    ];
});

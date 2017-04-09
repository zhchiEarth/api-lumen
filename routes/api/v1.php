<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {

    $api->post('authorizations', [
        'as' => 'authorizations.store',
        'uses' => 'AuthController@store',
    ]);

    //商品管理
    $api->get('/goods', 'GoodsController@index');
    $api->post('/goods', 'GoodsController@store');
    $api->put('/goods/{id}', 'GoodsController@update');
    $api->patch('/goods/{id}', 'GoodsController@status');
    $api->delete('/goods/{id}', 'GoodsController@destroy');

    //品牌
    $api->get('/goodsBrands', 'GoodsBrandController@index');
    $api->post('/goodsBrands', 'GoodsBrandController@store');
    $api->put('/goodsBrands/{id}', 'GoodsBrandController@update');
    $api->patch('/goodsBrands/{id}', 'GoodsBrandController@status');
    $api->delete('/goodsBrands/{id}', 'GoodsBrandController@destroy');


    //商品分类
    $api->get('/goodsCategories', 'GoodsCategoryController@index');
    $api->post('/goodsCategories', 'GoodsCategoryController@store');
    $api->put('/goodsCategories/{id}', 'GoodsCategoryController@update');
    $api->patch('/goodsCategories/{id}', 'GoodsCategoryController@status');
    $api->delete('/goodsCategories/{id}', 'GoodsCategoryController@destroy');

    //附加属性
    $api->get('/goodsCategories/{category_id}/additives', 'GoodsCategoryAdditiveController@index');
    $api->post('/goodsCategories/{category_id}/additives', 'GoodsCategoryAdditiveController@store');
    $api->put('/goodsCategories/{category_id}/additives/{id}', 'GoodsCategoryAdditiveController@update');
//    $api->patch('/goodsCategoryAdditives/{id}', 'GoodsCategoryAdditiveController@status');
    $api->delete('/goodsCategories/{category_id}/additives/{id}', 'GoodsCategoryAdditiveController@destroy');

    //属性
    $api->get('/goodsCategories/{category_id}/attributes', 'GoodsCategoryAttributeController@index');
    $api->post('/goodsCategories/{category_id}/attributes', 'GoodsCategoryAttributeController@store');
    $api->put('/goodsCategories/{category_id}/attributes/{id}', 'GoodsCategoryAttributeController@update');
//    $api->patch('/goodsCategoryAdditives/{id}', 'GoodsCategoryAdditiveController@status');
    $api->delete('/goodsCategories/{category_id}/attributes/{id}', 'GoodsCategoryAttributeController@destroy');


});

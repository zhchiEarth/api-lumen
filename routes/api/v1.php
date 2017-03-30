<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {


    $api->post('authorizations', [
        'as' => 'authorizations.store',
        'uses' => 'AuthController@store',
    ]);

    $api->get('/goodsBrands', 'GoodsBrandController@index');
    $api->post('/goodsBrands', 'GoodsBrandController@store');
    $api->put('/goodsBrands/{id}', 'GoodsBrandController@update');
    $api->patch('/goodsBrands/{id}', 'GoodsBrandController@status');


});

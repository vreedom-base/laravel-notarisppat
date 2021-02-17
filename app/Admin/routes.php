<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.as'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resources([
        'clients'       => ClientController::class,

    ]);

    $router->get('api/v1/indonesian/provinces', 'Indonesian\ApiController@provinces');
    $router->get('api/v1/indonesian/cities', 'Indonesian\ApiController@cities');
    $router->get('api/v1/indonesian/districts', 'Indonesian\ApiController@districts');
    $router->get('api/v1/indonesian/villages', 'Indonesian\ApiController@villages');

});

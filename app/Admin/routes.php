<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('templates', TemplatesController::class);
    $router->resource('activities', ActivitiesController::class);
    $router->resource('awards', AwardsController::class);
    $router->resource('certificates', CertificatesController::class);
    $router->resource('users', UsersController::class);

});

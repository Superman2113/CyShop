<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('users', UsersController::class);
    $router->resource('categories', CategoriesController::class);
    $router->resource('brand', BrandController::class);
    $router->resource('goods', GoodsController::class);
    $router->resource('property-name', PropertyNameController::class);
    $router->resource('property-value', PropertyValueController::class);
    $router->resource('coupon', CouponController::class);
    $router->resource('shipping-info', ShippingInfoController::class);
    $router->resource('order-master', OrderMasterController::class);
    $router->resource('area', AreaController::class);
});

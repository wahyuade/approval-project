<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
//public route
$app->get('api/login', function () use ($app) {
    return $app->version();
});


//private route
$app->group(['middleware' => 'auth'], function () use ($app) {
	$app->get('api/list/object', function ()    {
        // Uses Auth Middleware
    });

    $app->get('api/list/object/item', function () {
        // Uses Auth Middleware
    });

    $app->get('api/detail', function () {
        // Uses Auth Middleware
    });

    $app->get('api/approve', function () {
        // Uses Auth Middleware
    });

    $app->get('api/reject', function () {
        // Uses Auth Middleware
    });
});
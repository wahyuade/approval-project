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
$app->post('api/login', 'LoginController@postLogin');

$app->post('api/register', 'RegisterController@postDataRegister');

$app->post('api/add/approval', 'ApprovalController@insertApproval');

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

    $app->post('api/approve', function () {
        return 'ok';
    });

    $app->get('api/reject', function () {
        // Uses Auth Middleware
    });
});
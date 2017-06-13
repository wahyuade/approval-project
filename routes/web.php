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

$app->post('api/add/item', 'ApprovalitemController@insertDataApproval');

//private route
$app->group(['middleware' => 'auth'], function () use ($app) {
	$app->get('api/list/object', 'ApprovalController@listApproval');

    $app->get('api/list/object/item', 'ApprovalitemController@listItemApproval');


    $app->post('api/approve', 'ApprovalitemController@approve');

    $app->post('api/reject', 'ApprovalitemController@reject');
});
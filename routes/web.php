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

$router->post( 'register', [
    'as' => 'register', 'uses' => 'UserController@registerUser'
]);

$router->post( 'login', [
    'as' => 'login', 'uses' => 'UserController@authenticateUser'
]);

$router->group(['middleware' => 'jwt.auth'],
    function() use ($router) {
        $router->get( 'hash', [
            'as' => 'hash', 'uses' => 'UserController@generateHash'
        ]);
    }
);

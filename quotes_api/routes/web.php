<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('quotes',  ['uses' => 'QuoteController@index']);

    $router->get('quotes/{id}', ['uses' => 'QuoteController@show']);

    $router->post('quotes', ['uses' => 'QuoteController@create']);

    $router->delete('quotes/{id}', ['uses' => 'QuoteController@delete']);

    $router->put('quotes/{id}', ['uses' => 'QuoteController@update']);


    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');

  });

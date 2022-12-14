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

$router->post('/login', 'AuthController@login');
$router->get('/user/{id}', 'UserController@show');

$router->get('/mahasiswa', 'MahasiswaController@index');
$router->get('/mahasiswa/{id}', 'MahasiswaController@show');
$router->post('/mahasiswa', 'MahasiswaController@store');
$router->put('/mahasiswa/{id}', 'MahasiswaController@update');
$router->delete('/mahasiswa/{id}', 'MahasiswaController@destroy');

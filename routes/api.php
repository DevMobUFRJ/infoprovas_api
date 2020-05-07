<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {

    /* Curso */
    $router->get('/curso', 'CursoController@getAll');
    $router->get('/curso/{id}', 'CursoController@get');

});


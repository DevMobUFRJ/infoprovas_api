<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {

    /* Curso */
    $router->get('/cursos', 'CursoController@getAll');
    $router->get('/cursos/{curso_id}', 'CursoController@get');

    /* Disciplina */
    $router->get('/cursos/{curso_id}/disciplinas', 'DisciplinaController@getAll');
    $router->get('/cursos/{curso_id}/disciplinas/{disciplina_id}', 'DisciplinaController@get');
});


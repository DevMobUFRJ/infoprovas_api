<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {

    /* Course */
    $router->get('/courses', 'CourseController@getAll');
    $router->get('/courses/{course_id}', 'CourseController@get');

    /* Subject */
    $router->get('/courses/{course_id}/subjects', 'SubjectController@getAll');
    $router->get('/courses/{course_id}/subjects/{subject_id}', 'SubjectController@get');
});


<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {

    /* Courses */
    $router->get('/courses', 'CourseController@getAll');
    $router->get('/courses/{course_id}', 'CourseController@get');

    /* Subjects */
    $router->get('/courses/{course_id}/subjects', 'SubjectController@getAll');
    $router->get('/courses/{course_id}/subjects/{subject_id}', 'SubjectController@get');

    /* Exams */
    $router->get('/courses/{course_id}/subjects/{subject_id}/exams', 'ExamController@getAll');
    $router->get('/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}', 'ExamController@get');
    $router->get('/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}/file', 'ExamController@getPDF');
    // The route below apparently requires additional nginx/apache setup to be correctly loaded.
    //$router->get('/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}.pdf', 'ExamController@getPDF');

    /* Exam Types */
    $router->get('/exam_types', 'ExamTypeController@getAll');
    $router->get('/exam_types/{exam_type_id}', 'ExamTypeController@get');

    /* Professors */
    $router->get('/courses/{course_id}/professors', 'ProfessorController@getAll');
    $router->get('/courses/{course_id}/professors/{professor_id}', 'ProfessorController@get');

});


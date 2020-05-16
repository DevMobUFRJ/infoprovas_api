<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->group(['prefix' => 'api'], function () use ($router) {

    /* Courses */
    $router->get('/courses', 'CourseController@getAll');
    $router->get('/courses/{course_id}', 'CourseController@get');

    /* Subjects */
    $router->get('/courses/{course_id}/subjects', 'SubjectController@getAll');
    $router->get('/courses/{course_id}/subjects/{subject_id}', 'SubjectController@get');

    /* Exams */
    $router->post('/courses/{course_id}/new_exam', 'ExamController@addExam');
    //>>> by subject
    $router->get('/courses/{course_id}/subjects/{subject_id}/exams', 'ExamController@getAllBySubject');
    $router->get('/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}', 'ExamController@getBySubject');
    $router->get('/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}/file', 'ExamController@getPDFBySubject');
    $router->post('/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}/report', 'ExamController@reportBySubject');
    //>>> by professor
    $router->get('/courses/{course_id}/professors/{professor_id}/exams', 'ExamController@getAllByProfessor');
    $router->get('/courses/{course_id}/professors/{professor_id}/exams/{exam_id}', 'ExamController@getByProfessor');
    $router->get('/courses/{course_id}/professors/{professor_id}/exams/{exam_id}/file', 'ExamController@getPDFByProfessor');
    $router->post('/courses/{course_id}/professors/{professor_id}/exams/{exam_id}/report', 'ExamController@reportByProfessor');
    // The route below apparently requires additional nginx/apache setup to be correctly loaded.
    //$router->get('/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}.pdf', 'ExamController@getPDF');

    /* Exam Types */
    $router->get('/exam_types', 'ExamTypeController@getAll');
    $router->get('/exam_types/{exam_type_id}', 'ExamTypeController@get');

    /* Professors */
    $router->get('/courses/{course_id}/professors', 'ProfessorController@getAll');
    $router->get('/courses/{course_id}/professors/{professor_id}', 'ProfessorController@get');

});


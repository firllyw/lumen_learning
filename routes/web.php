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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'private'], function() use ($router){
    $router->group(['prefix' => 'user'], function() use($router){
        $router->get('/', 'UserController@index');
        $router->get('/{id}', 'UserController@show');
        $router->post('', 'UserController@store');
        $router->put('/{id}', 'UserController@update');
        $router->delete('/{id}', 'UserController@destroy');
    });
    $router->group(['prefix' => 'auth-level'], function() use($router){
        $router->get('/', 'AuthLevelController@index');
        $router->get('/{id}', 'AuthLevelController@show');
        $router->post('', 'AuthLevelController@store');
        $router->put('/{id}', 'AuthLevelController@update');
        $router->delete('/{id}', 'AuthLevelController@destroy');
    });
});

$router->group(['prefix' => 'api'], function() use ($router){
    $router->group(['prefix' => 'course'], function() use($router){
        $router->get('/', 'CourseController@index');
        $router->get('/{id}', 'CourseController@show');
        $router->post('', 'CourseController@store');
        $router->put('/{id}', 'CourseController@update');
        $router->delete('/{id}', 'CourseController@destroy');
    });

    // Course Category
    $router->group(['prefix' => 'course-category'], function() use($router){
        $router->get('/', 'CourseCategoryController@index');
        $router->get('/{id}', 'CourseCategoryController@show');
        $router->post('', 'CourseCategoryController@store');
        $router->put('/{id}', 'CourseCategoryController@update');
        $router->delete('/{id}', 'CourseCategoryController@destroy');
    });


});
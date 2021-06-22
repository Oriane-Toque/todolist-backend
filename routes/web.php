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

$router->get(
    '/', // url
    [
        'uses' => 'MainController@home', // nomDuController@NomDeLaMethode
        'as'   => 'main-home' // nom de la route
    ]
);

//Endpoint /categories : nous donne toute les categories
$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list',
        'as'   => 'category-list'
    ]
);


//Endpoint /categories/unId : nous donne les infos de la categories numéro "unId"
$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item',
        'as'   => 'category-item'
    ]
);

//Endpoint /tasks GET
$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list',
        'as'   => 'task-list'
    ]
);

//Endpoint /tasks POST
$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@add',
        'as'   => 'task-add'
    ]
);

//! modification des tâches

// Endpoint /tasks/{id} PUT
$router->put(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update',
        'as'   => 'task-update'
    ]
);

// Endpoint /tasks/{id} PATCH
$router->patch(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update',
        'as'   => 'task-patch'
    ]
);


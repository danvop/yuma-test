<?php

$router->get('', 'UsersController@index');
// $router->get('back', 'UsersController@index');
$router->get('login', 'UsersController@login');
$router->get('logout', 'UsersController@logout');
$router->get('useradd', 'UsersController@useradd');
$router->get('usershow', 'UsersController@usershow');

$router->post('login', 'UsersController@authorize');
$router->post('store', 'UsersController@store');
$router->post('userdel', 'UsersController@userdel');
$router->post('useredit', 'UsersController@useredit');


// $router->get('', 'PagesController@home');
// $router->get('about', 'PagesController@about');
// $router->get('contact', 'PagesController@contact');

// $router->get('users', 'UsersController@index');
// $router->post('users', 'UsersController@store');

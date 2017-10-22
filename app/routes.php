<?php

$router->get('', 'UsersController@index');
$router->get('login', 'UsersController@login');
$router->get('logout', 'UsersController@logout');
$router->get('useradd', 'UsersController@useradd');

$router->post('login', 'UsersController@authorize');
$router->post('store', 'UsersController@store');
// $router->get('', 'PagesController@home');
// $router->get('about', 'PagesController@about');
// $router->get('contact', 'PagesController@contact');

// $router->get('users', 'UsersController@index');
// $router->post('users', 'UsersController@store');

<?php

$router->get('', 'PagesController@index');
$router->get('filterReset', 'PagesController@filterReset');
$router->get('f', 'PagesController@filter');

$router->get('login', 'UsersController@login');
$router->get('logout', 'UsersController@logout');
$router->get('useradd', 'UsersController@useradd');
$router->get('usershow', 'UsersController@usershow');

$router->post('login', 'UsersController@authorize');
$router->post('store', 'UsersController@store');
$router->post('delete', 'UsersController@delete');
$router->post('useredit', 'UsersController@useredit');

<?php

use app\User;

require('vendor/autoload.php');



$user = new User;
$user->insert([
    'name' => 'jodfhn',
    'email' => 'jddohn@mail.com',
    'password' => 'secret',
    'role' => 'user'
    ]);

dd($user->fetchAll());
//$user->getConnection();

// $user = 'admin';

// view('index', compact('user'));
// 


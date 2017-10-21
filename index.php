<?php
require('vendor/autoload.php');

use app\Auth;
use app\User;

use core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());




// $user = (new User)->checkUserByEmail('john@mail.com');

// Auth::logout();

// var_dump(Auth::check());



// $user = new User;
// $user->insert([
//     'name' => 'jodfhn',
//     'email' => 'jddohn@mail.com',
//     'password' => 'secret',
//     'role' => 'user'
//     ]);

// dd($user->fetchAll());
//$user->getConnection();

// $user = 'admin';

// view('index', compact('user'));
// 

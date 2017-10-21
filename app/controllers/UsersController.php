<?php

namespace app\controllers;

use app\Auth;
use app\User;

class UsersController
{
    public function index()
    {
        $users = (new User)->fetchAll();
        return view('index', compact('users'));
    }

    public function login()
    {
        $user = (new User)->checkUserByEmail('john@mail.com');
        Auth::login($user);
        redirect('');
    }
    public function logout()
    {
        Auth::logout();
        redirect('');

    }
}

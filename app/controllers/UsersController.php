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
          return view('login');
    }
    public function logout()
    {
        Auth::logout();
        redirect('');

    }
    public function authorize()
    {
        try {
            $user = (new User)->checkUserByEmail($_POST['email']);
            if ($user->getEmail() == $_POST['email']
                && password_verify($_POST['password'], $user->getPassword())) {
                Auth::login($user);
                redirect('');
            }
            throw new \Exception();
        } catch (\Exception $e) {
            echo 'wrong password or email';
            die();
        }
        
    }
    
    public function useradd()
    {
        return view('useradd');
    }

    public function store()
    {
        User::store([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'role' => $_POST['role']
            ]);
        redirect('');
    }
}

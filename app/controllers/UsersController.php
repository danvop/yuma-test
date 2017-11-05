<?php

namespace app\controllers;

use app\Auth;
use app\User;

class UsersController
{
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
                die();
            }
            throw new \Exception('Wrong password or email');
        } catch (\Exception $e) {
            errHandle($e->getMessage());
            back();
        }
    }
    
    public function useradd()
    {
        if ((Auth::userRole() != 'admin')) {
            errHandle('Forbidden');
            redirect('');
            die();
        }
        return view('useradd');
    }

    public function usershow()
    {
        $user = (new User)->checkUserByEmail($_GET['email']);
        return view('usershow', compact('user'));
    }
    public function delete()
    {
        $user = new User;
        try {
            $user->delete($_POST['id']);
            redirect('');
        } catch (\Exception $e) {
            errHandle($e);
            back();
        }
    }

    public function store()
    {
        $user = new User;
        try {
            $user->store([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'role' => $_POST['role']
            ]);
            redirect('');
        } catch (\Exception $e) {
            if ($e->getCode() == '23000') {
                errHandle('This email already exists');
                back();
                die();
            }
            
            errHandle($e->getMessage());
            back();
        }
    }

    public function useredit()
    {
        try {
            (new User)->update([
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            //'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'role' => $_POST['role']
            ]);
            redirect('');
        } catch (\Exception $e) {
            if ($e->getCode() == '23000') {
                errHandle('This email already exists');
                back();
                die();
            }
            
            errHandle($e->getMessage());
            back();
        }
    }
}

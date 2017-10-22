<?php

namespace app;

use app\User;

class Auth
{
    public static function login(User $user)
    {
        $_SESSION['user'] = [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
        ];
    }

    public static function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        
    }

    public static function check()
    {
        return (isset($_SESSION['user']));
    }

    public static function userName()
    {
        if (static::check()) {
            return $_SESSION['user']['name'];
        }
    }

    public static function userRole()
    {
        if (static::check()) {
            return $_SESSION['user']['role'];
        }
    }
}

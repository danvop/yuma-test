<?php

namespace app\controllers;

use app\User;

class PagesController
{
    public function index()
    {

        
        if (isset($_GET['sort'])) {
            $chunks = preg_split('/(?=[A-Z])/', $_GET['sort']);
        }
        var_dump($chunks);

        //nameAZ
        //nameZA
        //direction = AZ or ZA
        //column = name
        if (isset($_GET['sort'])) {
            usort($users, function ($a, $b) {
                return strnatcmp($a->{$_GET['sort']}, $b->{$_GET['sort']});
            });
        }

        


        $users = (new User)->fetchAll();
        //var_dump($_GET['sortUp']);
        if (isset($_GET['sortAZ'])) {
            usort($users, function ($a, $b) {
                return strnatcmp($a->{$_GET['sortAZ']}, $b->{$_GET['sortAZ']});
            });
        }

        if (isset($_GET['sortZA'])) {
            usort($users, function ($a, $b) {
                return strnatcmp($b->{$_GET['sortZA']}, $a->{$_GET['sortZA']});
            });
        }
      
        //var_dump($users);

        return view('index', compact('users'));
    }

    public function filter()
    {
        // idUp
        // idDown
        // nameUp
        // nameDown
        // emailUp
        // emailDown
        // roleUp
        // roleDown
    }

    public function setSort()
    {

    }

    public function filterReset()
    {

    }
}

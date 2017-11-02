<?php

namespace app\controllers;

use app\User;

class PagesController
{
    public function index()
    {
        setSort();
        if (getSort()) {
            $chunks = preg_split('/(?=[A-Z])/', getSort());
            $sortType = $chunks[0];
            $sortDir = $chunks[1];
        }
    
        $users = (new User)->fetchAll();

        if (getSort()) {
            usort($users, function ($a, $b) use ($sortDir, $sortType) {
                if ($sortDir == 'Az') {
                    return strnatcmp($a->{$sortType}, $b->{$sortType});
                }
                if ($sortDir == 'Za') {
                    return strnatcmp($b->{$sortType}, $a->{$sortType});
                }
            });
        }



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
        if (getSort()) {
            unset($_SESSION['sort']);
        }
        redirect('');
    }
}

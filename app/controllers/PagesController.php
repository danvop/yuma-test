<?php

namespace app\controllers;

use app\User;

class PagesController
{
    public function index()
    {
        //var_dump($_SERVER);
        setSort();
        
    
        $users = (new User)->fetchAll();

        if (getSort()) {
            $chunks = preg_split('/(?=[A-Z])/', getSort());
            $sortType = $chunks[0];
            $sortDir = $chunks[1];
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
        // if (getFilt()) {
        //     unset($_SESSION['filt']);
        // }
        
        // setFilt($_SERVER['QUERY_STRING']);

        $filtQuery = $_GET['filtQuery'] ?? '';
        $filtBy = $_GET['filtBy'] ?? '';
        setFilt($filtQuery, $filtBy);
        setSort();
        $users = (new User)->fetchFilt($filtQuery, $filtBy);
        if (getSort()) {
            $chunks = preg_split('/(?=[A-Z])/', getSort());
            $sortType = $chunks[0];
            $sortDir = $chunks[1];
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

    public function filterReset()
    {
        if (getSort()) {
            unset($_SESSION['sort']);

        }
        if (getfilt()) {
            unset($_SESSION['filt']);
        }
        
        redirect('');
    }
}

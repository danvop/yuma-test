<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

/**
 * Testing helper dump and die
 * @param  $param
 * @return var_dump($param)
 */
function dd($param)
{
    echo '<pre>';
    die(var_dump($param));
    echo '</pre>';
}

function redirect($path)
{
    header("Location: /{$path}");
}

function back()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function errHandle(\Exception $e)
{
    $_SESSION['error'] = $e->getMessage();
}

function err($e)
{
    $_SESSION['error'] = $e;
}

function errShow()
{
    if(isset($_SESSION['error'])){
        require "app/views/partials/error.php";
        unset($_SESSION['error']);
    }
    
}
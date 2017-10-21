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
    var_dump($param);
    die();
}
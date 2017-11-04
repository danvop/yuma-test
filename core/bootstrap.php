<?php


use core\App;

session_start();

App::bind('config', require 'config.php');

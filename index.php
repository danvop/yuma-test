<?php
require('vendor/autoload.php');

use core\{Router, Request};

try {
    Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method()); 
} catch (\Exception $e) {

}

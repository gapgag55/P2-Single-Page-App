<?php 

require 'vendor/autoload.php';
require 'config.php';

use App\Core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
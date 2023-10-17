<?php

use Pecee\SimpleRouter\SimpleRouter;

require_once(__DIR__.'/../vendor/autoload.php');

/* Load external routes file */
require_once(__DIR__.'/../src/routes.php');

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

SimpleRouter::setDefaultNamespace('Au3pm\Registry\Controllers');

// Start the routing
SimpleRouter::start();

<?php
/* start session */
if (!session_id()) session_start();

/* start routes */
$routes = require_once __DIR__ . "/../app/routes.php";
$route = new \Core\Route($routes);
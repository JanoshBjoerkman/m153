<?php
require_once("lib/config.php");
require_once(LIBRARY_PATH . "/init.php");

$router = new Router ();
$router->controller->handleRequest();

?>

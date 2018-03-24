<?php
require_once MODULE_PATH.DS.MODULE_NAME.DS."Config".DS."routes.php";
// echo '<pre>';print_r($routes);die;//dirname(dirname(MODULE_NAME)), 
$routes->sendResponse($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
// die('module');


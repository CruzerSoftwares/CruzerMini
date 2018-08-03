<?php
require_once MODULE_PATH.DS.MODULE_NAME.DS."Config".DS."routes.php";
global $loadedModules;

$uri2        = str_replace(str_replace(array('http://','https://','http://www.','https://www.'),'',APP_URL),"", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

define('MODULE_ALIAS',array_search(MODULE_NAME,$loadedModules));

$routes->sendResponse(DS.$uri2, $_SERVER['REQUEST_METHOD']);

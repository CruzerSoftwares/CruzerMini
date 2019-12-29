<?php
require_once MODULE_PATH.DS.MODULE_NAME.DS."Config".DS."routes.php";

$uri  = str_replace(
            str_replace(array('http://','https://','http://www.','https://www.'),'',APP_URL),
            "",
            $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
          );

define('MODULE_ALIAS',array_search(MODULE_NAME,$GLOBALS['loadedModules']));
$routes->sendResponse(DS.$uri, $_SERVER['REQUEST_METHOD']);

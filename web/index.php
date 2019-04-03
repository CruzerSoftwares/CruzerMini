<?php 
/**
 * Handle the requests and serve the response for CruzerMini App
 *
 * PHP version 7.2
 * 
 * @category  PHP
 * @package   Core
 * @author    RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @copyright 2018 Cruzer Softwares
 * @license   https://github.com/CruzerSoftwares/CruzerMini/blob/master/licence.txt MIT License
 * @version   GIT: 1.0.0
 * @link      https://cruzersoftwares.github.io/CruzerMini/
 */

ob_start();
if (!session_id()) {
    session_start();
}

require '../vendor/autoload.php';

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

define('ROOT_DIR', dirname(dirname(__FILE__)));
define('ROOT',     basename(dirname(dirname(__FILE__))));
define('APP_DIR', ROOT_DIR.DS.'app');
define('LOG_DIR', '../log');

$cruzerHandler = new Cruzer\Framework\Handler();
$cruzerHandler->initilize();

require_once APP_DIR.DS."Config".DS."app.php";
$routes = require_once APP_DIR.DS."Config".DS."routes.php";
require_once __DIR__.'/../core/framework/Database.php';
$routes->serve(basename(__DIR__), $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


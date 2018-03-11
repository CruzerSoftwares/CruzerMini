<?php ob_start();
if( !session_id() ) session_start ();

// Set a logging file
define('LOG_DIR', '../log');
ini_set('error_log', LOG_DIR.'/errors.log');

// Override the default error handler behavior
set_exception_handler(function($exception) {
   error_log($exception);
});

use Cruzer\Framework\Handler;
require '../vendor/autoload.php';

define('ROOT_DIR', dirname( dirname(__FILE__) ));
define('ROOT',     basename(dirname( dirname(__FILE__) )));
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR.DS.'app');

$cruzerHandler = new Cruzer\Framework\Handler();
$cruzerHandler->initilize();

date_default_timezone_set( _config('APP_TIMEZONE', 'Asia/Calcutta'));
define('ERROR_LEVEL',      _config('APP_ENV', 'production'));
define('DEBUG_ERROR',      _config('APP_DEBUG', 'Off'));

switch (ERROR_LEVEL) {
    case 'development':
        ini_set('display_startup_errors',1);
        ini_set('display_errors', DEBUG_ERROR);
        error_reporting(E_ALL);
    break;
    case 'testing'    : error_reporting( E_ALL ^ E_NOTICE );
                        ini_set('display_errors', DEBUG_ERROR); break;
    case 'production' : ini_set('display_errors', DEBUG_ERROR); break;
    default           : error_reporting( E_ALL );
                        ini_set('display_errors', DEBUG_ERROR); break;
}

define('APP_URL',                 _config('APP_URL'));
define('APP_UNDER_DIR',           _config('APP_UNDER_DIR'));
define('APP_TITLE',               _config('APP_TITLE'));
define('VIEW_DIR',                _config('VIEW_DIR','Views'));
define('CONTROLLER_DIR',          _config('CONTROLLER_DIR','Controllers'));
define('UPLOAD_DIR',              _config('UPLOAD_DIR'));
define('THEME_DIR',               _config('THEME_DIR'));
define('THEME_PATH', ROOT_DIR.DS.THEME_DIR.DS);
define('WEB_DIR',                 _config('WEB_DIR'));
define('WEB_PATH',                 APP_URL.DS.WEB_DIR);
define('MODULE_DIR',              _config('MODULE_DIR'));
define('META_DESCRIPTION',        _config('META_DESCRIPTION'));
define('META_KEYWORDS',           _config('META_KEYWORDS'));
define('COPYRIGHT',               _config('COPYRIGHT'));
define('COPYRIGHT_URL',           _config('COPYRIGHT_URL'));
define('ADMIN_DIR',               _config('ADMIN_DIR'));
define('ADMIN_PATH', APP_URL.DS.ADMIN_DIR.DS);
define('ADMIN_LOGIN_REDIRECT',  ADMIN_PATH._config('dashboard'));
define('ADMIN_LOGOUT_REDIRECT', ADMIN_PATH._config('auth'));

// require_once APP_DIR.DS."Config".DS."app.php";
// require_once APP_DIR.DS."Config".DS."database.php";
require_once APP_DIR.DS."Config".DS."routes.php";

$routes->handle( basename(__DIR__), $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'] );


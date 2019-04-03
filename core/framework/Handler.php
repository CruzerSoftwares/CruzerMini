<?php

namespace Cruzer\Framework;

/**
 * This class initializes the CruzerMini App and handles the requests
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since version 1. Date: 9th Jan, 2018
 * @modified 19th March, 2018
 */

class Handler
{

    /**
     * Override the default error handler behavior
     * enables the logging to a default file
     */
    protected function setLogging()
    {
        ini_set('error_log', LOG_DIR.'/errors.log');
        /*set_exception_handler(function($exception) {
           error_log($exception);
        });*/
    }

    /**
     * Setup variables that will be available throughout life cycle
     */
    protected function setUp()
    {
        date_default_timezone_set(_config('APP_TIMEZONE', 'Asia/Kolkata'));

        define('ERROR_LEVEL', _config('APP_ENV', 'production'));
        define('DEBUG_ERROR', _config('APP_DEBUG', 'Off'));
        define('APP_URL', _config('APP_URL'));
        define('APP_TITLE', _config('APP_TITLE'));
        define('VIEW_DIR', _config('VIEW_DIR', 'Views'));
        define('CONTROLLER_DIR', _config('CONTROLLER_DIR', 'Controllers'));
        define('UPLOAD_DIR', _config('UPLOAD_DIR'));
        define('THEME_DIR', _config('THEME_DIR'));
        define('THEME_PATH', THEME_DIR.DS);
        define('WEB_DIR', _config('WEB_DIR'));
        define('WEB_PATH', APP_URL.DS.WEB_DIR);
        define('MODULE_DIR', _config('MODULE_DIR'));
        define('MODULE_PATH', ROOT_DIR.DS.MODULE_DIR);
        define('META_DESCRIPTION', _config('META_DESCRIPTION'));
        define('META_KEYWORDS', _config('META_KEYWORDS'));
        define('COPYRIGHT', _config('COPYRIGHT'));
        define('COPYRIGHT_URL', _config('COPYRIGHT_URL'));
        define('ADMIN_DIR', _config('ADMIN_DIR'));
        define('ADMIN_PATH', APP_URL.DS.ADMIN_DIR.DS);
        define('ADMIN_LOGIN_REDIRECT', ADMIN_PATH._config('dashboard'));
        define('ADMIN_LOGOUT_REDIRECT', ADMIN_PATH._config('auth'));

        switch (ERROR_LEVEL) {
            case 'development':
                ini_set('display_startup_errors', 1);
                ini_set('display_errors', DEBUG_ERROR);
                error_reporting(E_ALL);
                break;
            case 'testing':
                error_reporting(E_ALL ^ E_NOTICE);
                ini_set('display_errors', DEBUG_ERROR);
                break;
            case 'production':
                ini_set('display_errors', DEBUG_ERROR);
                break;
            default:
                error_reporting(E_ALL);
                ini_set('display_errors', DEBUG_ERROR);
                break;
        }
    }

    /**
     * Parses config.ini file
     * Provides the way to fetch the variables defined in this file to everywhere
     */
    public function initilize()
    {
        $this->setLogging();

        if (!file_exists(APP_DIR.DS.'Config'.DS.'config.ini')) {
            throw new \Exception('Configuration file "'.APP_DIR.DS.'Config'.DS.'config.ini" not present');
        }

        $contents   = file_get_contents(APP_DIR.DS.'Config'.DS.'config.ini');
        $contentsAr = explode(PHP_EOL, $contents);
        global $_config;
        foreach ($contentsAr as $config) {
            if ($config!='' && !preg_match('/^;/', $config)) {
                $key = strstr($config, '=', true);
                $val = ltrim(strstr($config, '=', false), '=');
                $_config[$key] = $val;
            }
        }
        $this->setUp();
        return $_config;
    }
}

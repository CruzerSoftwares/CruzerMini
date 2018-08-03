<?php
/**
 * Routes for CruzerMini App.
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

namespace Cruzer\Framework;

/**
 * This class handles request by dynamic passing routeInfo to the serve method
 *
 * @category  PHP
 * @package   Core
 * @author    RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @copyright 2018 Cruzer Softwares
 * @license   https://github.com/CruzerSoftwares/CruzerMini/blob/master/licence.txt MIT License
 * @version   Release: 1.0.0
 * @link      https://cruzersoftwares.github.io/CruzerMini/
 */

class Routes
{

    protected $routes;
    protected $routePrefix;

    /**
     * Initialize the Route
     */
    public function __construct()
    {
    }

    protected function checkModule($uri = '')
    {
        global $loadedModules;
        $uriAr = explode('/', $uri);
        
        if (array_key_exists($uriAr[1], $loadedModules)) {
            return true;
        }
        return false;
    }

    protected function getModuleDir($uri = '')
    {
        global $loadedModules;
        $uriAr = explode('/', $uri);
        
        if (array_key_exists($uriAr[1], $loadedModules)) {
            return $loadedModules[$uriAr[1]];
        }
        return false;
    }

    /**
     * Serves the Requests
     *
     * @param string $dir
     * @param string $request
     * @param string $method
     * @return void
     */
    public function serve($dir, $request, $method)
    {
        // Fetch method and URI from somewhere
        $uri        = str_replace(ROOT.DS.$dir."/", "", $request);

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        //if its module url then process it
        if ($this->checkModule($uri) === true) {
            $currentModule = $this->getModuleDir($uri);
            if (!defined('MODULE_NAME')) {
                define('MODULE_NAME', $currentModule);
            }
            require_once MODULE_PATH.DS.$currentModule.DS."module.php";
        } else {
            $this->sendResponse($uri, $method);
        }
    }

    private function sendResponse($uri, $method)
    {
        $uri        = rawurldecode($uri);
        $dispatcher = $this->getDispatcher();
        $routeInfo  = $dispatcher->dispatch($method, $uri);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                __('The requested page '._($uri).' could not be found!');
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                __('Method Not Allowed!');
                header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars    = $routeInfo[2];

                if (strpos($handler, '@')!= false) {
                    $className = strstr($handler, '@', true);
                    $methodName = ltrim(strstr($handler, '@', false), '@');

                    $class = new $className();
                    $class->{$methodName}(implode(',', $vars));
                }
                break;
        }
    }


    public function addRoute($path, $controller, $method = 'GET')
    {
        $this->routes[] = [ $this->routePrefix.$path, $controller, $method ];
    }

    public function getDispatcher()
    {
        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $routeObj) {
            foreach ($this->routes as $route) {
                $routeObj->addRoute($route['2'], $route['0'], $route['1']);
            }
        });

        return $dispatcher;
    }

    public function addGroup($prefix, callable $callback)
    {
        $tmpPrefix = $this->routePrefix;
        $this->routePrefix = $prefix;
        $callback($this);
        $this->routePrefix = $tmpPrefix;
    }

    public function add($method, $path, $controller)
    {
        $this->addRoute($path, $controller, $method);
    }

    public function get($path, $controller)
    {
        $this->addRoute($path, $controller, 'GET');
    }

    public function post($path, $controller)
    {
        $this->addRoute($path, $controller, 'POST');
    }

    public function all($path, $controller)
    {
        $this->get($path, $controller);
        $this->post($path, $controller);
    }
}

<?php

namespace Cruzer\Framework;

/**
 * This class handles request by dunamic passing routeInfo to the serve method
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since version 1. Date: 10th March, 2018
 */

class Routes {

	protected $routes;

	public function __construct() {
	}

	public function handle( $dir, $request, $method) {
		// Fetch method and URI from somewhere
		$uri        = str_replace(ROOT.DS.$dir."/","", $request);

		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
		    $uri = substr($uri, 0, $pos);
		}

		$uri = rawurldecode($uri);
		$dispatcher = $this->getDispatcher();
		$routeInfo = $dispatcher->dispatch($method, $uri);

		switch ($routeInfo[0]) {
		    case \FastRoute\Dispatcher::NOT_FOUND:
		        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
		        break;
		    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
		        $allowedMethods = $routeInfo[1];
		        header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
		        break;
		    case \FastRoute\Dispatcher::FOUND:
		        $handler = $routeInfo[1];
		        $vars    = $routeInfo[2];
		        if( strpos($handler, '@')!= false ){
		        	$className = strstr($handler,'@', true);echo PHP_EOL;
		        	$methodName = ltrim( strstr( $handler,'@', false ), '@' );

		        	$class = new $className();
		        	$class->{$methodName}();
		        }
		        break;
		}
	}

	public function addRoute($path, $controller, $method = 'GET') {
		$this->routes[] = [ $path, $controller, $method ];
	}

	public function getDispatcher() {
		$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
			foreach($this->routes as $route){
			    $r->addRoute($route['2'], $route['0'], $route['1']);
			}
		});

		return $dispatcher;
	}

	public function add($method, $path, $controller) {
		$this->addRoute($path, $controller, $method );
	}

	public function get($path, $controller) {
		$this->addRoute($path, $controller, 'GET');
	}

	public function post($path, $controller) {
		$this->addRoute($path, $controller, 'POST');
	}

	public function all($path, $controller) {
		$this->get($path, $controller);
		$this->post($path, $controller);
	}
}


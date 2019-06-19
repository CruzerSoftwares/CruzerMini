<?php
namespace App\Models;

class App extends \Dolphin\Mapper\ORM {

	public $db;

/* 
	public function __construct(){
	    
	}
	
    public function __call($method, $args) {
      $class = get_called_class();
		if(class_exists($class)){
			$reflector = new \ReflectionClass($class);
			$reflector->getParentClass();
			if ($reflector->hasMethod('action'.$method)) {
				$obj = new $class();
			    return call_user_func_array(
			        array($obj, 'action'.$method),
			        $args
			    );
			}
		}

		throw new \Exception("Method `$method()` is not defined!");
    }


	public static function __callStatic($method, $args) {
		$class = get_called_class();
		if(class_exists($class)){
			$reflector = new \ReflectionClass($class);
			$reflector->getParentClass();
			if ($reflector->hasMethod('action'.$method)) {
				$obj = new $class();
			    return call_user_func_array(
			        array($obj, 'action'.$method),
			        $args
			    );
			}
		}

		throw new \Exception("Method `$method()` is not defined!");
	} */

}
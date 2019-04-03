<?php
namespace App\Models;

class App{

	public $db;

	public function __construct(){
	    $connection = require_once APP_DIR.DS."Config".DS."database.php";
	    $dbObj = new \Cruzer\Framework\Database($connection);
	    $this->db = $dbObj->getConnection();
    }

    public function __call($method, $args) {die('call');
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
	}

}
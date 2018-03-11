<?php

namespace Cruzer\Framework;

/**
 * This class handles request by dunamic passing routeInfo to the serve method
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since version 1. Date: 9th Jan, 2018
 */

class Handler {

	public function initilize( ) {
		if(file_exists(APP_DIR.DS.'Config'.DS.'config.ini')){
		  $contents   = file_get_contents(APP_DIR.DS.'Config'.DS.'config.ini');
		  $contentsAr = explode(PHP_EOL,$contents);
		  global $_config;
		  foreach($contentsAr as $config){
		    if($config!='' && !preg_match('/^;/', $config)){
		      $key = strstr($config,'=',true);
		      $val = ltrim(strstr($config,'=',false),'=');
		      $_config[$key] = $val;
		    }
		  }
		  return $_config;
		} else{
		  echo('Configuration file "'.APP_DIR.DS.'Config'.DS.'config.ini" not present');
		}
	}

}


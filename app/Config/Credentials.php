<?php

/**
 * This class is provided for reference
 * Any application that want to use the Dolphin must provide the
 * Same functionality as this class provides e.g. Credentials::get('user').
 */

namespace App\Config;

class Credentials
{
    public static function __callStatic($name, $arguments)
    {
        $dbCredentials = require('database.php');
        $var = $arguments[0];
    
        if(array_key_exists($var, $dbCredentials)){
            return $dbCredentials[$var];
        }
        
        throw new \Exception("The requested key $var not found!", 1);
    }
}

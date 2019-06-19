<?php

/**
 * This class is provided for reference
 * Any application that want to use the Dolphin must provide the
 * Same functionality as this class provides e.g. Credentials::get('user').
 */

namespace App\Config;

class Credentials
{
    public static $driver = 'mysql';
    public static $db = 'cruzermini';
    public static $user = 'root';
    public static $password = 'admin123';
    public static $prefix = 'tbl_';
    public static $charset = 'utf-8';

    public static function __callStatic($name, $arguments)
    {
        $var = $arguments[0];

        $c = new \ReflectionClass('\App\Config\Credentials');

        return $c->getStaticPropertyValue($var);
    }
}

<?php

/**
 * Database connection for CruzerMini App.
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

return [
    'driver'    => _config('DB_DRIVER', 'mysql'),
    'host'      => _config('DB_HOST'),
    'database'  => _config('DB_DATABASE'),
    'username'  => _config('DB_USERNAME'),
    'password'  => _config('DB_PASSWORD'),
    'charset'   => _config('DB_CHARSET'),
    'collation' => _config('DB_COLLATION'),
    'prefix'    => _config('DB_PREFIX'),
    'dbpath'    => _config('DB_PATH'),
];

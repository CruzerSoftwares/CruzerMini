<?php

$routes = new Cruzer\Framework\Routes();

$routes->get('/', 'App\Controllers\PagesController@index');
$routes->get('/contact-us', 'App\Controllers\PagesController@contact');
$routes->get('/{alias}', 'App\Controllers\PagesController@view');
$routes->post('/contact-us', 'App\Controllers\PagesController@contactform');
$routes->add('GET|POST','/{alias}', 'App\Controllers\PagesController@view');

return $routes;

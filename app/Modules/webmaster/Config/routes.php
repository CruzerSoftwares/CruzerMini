<?php
$routes = new Cruzer\Framework\Routes();

$routes->get('/webpanel2', 'App\Modules\Webmaster\Controllers\PagesController@index');
$routes->get('/auth', 'App\Modules\Webmaster\Controllers\PagesController@contact');

return $routes;

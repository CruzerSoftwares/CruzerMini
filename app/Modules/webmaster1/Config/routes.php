<?php

$route['login'] = 'users/login';


$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'dashboard/index';


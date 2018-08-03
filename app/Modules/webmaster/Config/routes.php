<?php
$routes = new Cruzer\Framework\Routes();

$routes->addGroup('/webpanel', function ($routes) {
	$routes->get('/', 'App\Modules\Webmaster\Controllers\PagesController@dashboard');
	$routes->get('/dashboard', 'App\Modules\Webmaster\Controllers\PagesController@dashboard');
	$routes->all('/auth', 'App\Modules\Webmaster\Controllers\UsersController@login');
	$routes->all('/logout', 'App\Modules\Webmaster\Controllers\UsersController@logout');
	$routes->all('/settings', 'App\Modules\Webmaster\Controllers\SettingsController@site');
	$routes->all('/menus', 'App\Modules\Webmaster\Controllers\SettingsController@menus');
	$routes->all('/themes', 'App\Modules\Webmaster\Controllers\SettingsController@themes');
	$routes->all('/route', 'App\Modules\Webmaster\Controllers\SettingsController@route');
	$routes->all('/logging', 'App\Modules\Webmaster\Controllers\SettingsController@logging');
	$routes->all('/update-password', 'App\Modules\Webmaster\Controllers\UsersController@updatePassword');
	$routes->all('/account-settings', 'App\Modules\Webmaster\Controllers\UsersController@account');

	$routes->get('/pages', 'App\Modules\Webmaster\Controllers\PagesController@index');
	$routes->get('/pages/view/{id:\d+}', 'App\Modules\Webmaster\Controllers\PagesController@view');
	$routes->all('/pages/edit/{id:\d+}', 'App\Modules\Webmaster\Controllers\PagesController@edit');
	$routes->all('/pages/add', 'App\Modules\Webmaster\Controllers\PagesController@add');
	$routes->post('/pages/delete/{id:\d+}', 'App\Modules\Webmaster\Controllers\PagesController@delete');

	$routes->get('/posts', 'App\Modules\Webmaster\Controllers\PostsController@index');
	$routes->get('/posts/view/{id:\d+}', 'App\Modules\Webmaster\Controllers\PostsController@view');
	$routes->all('/posts/edit/{id:\d+}', 'App\Modules\Webmaster\Controllers\PostsController@edit');
	$routes->all('/posts/add', 'App\Modules\Webmaster\Controllers\PostsController@add');
	$routes->post('/posts/delete/{id:\d+}', 'App\Modules\Webmaster\Controllers\PostsController@delete');

	$routes->get('/reviews', 'App\Modules\Webmaster\Controllers\ReviewsController@index');
	$routes->get('/reviews/view/{id:\d+}', 'App\Modules\Webmaster\Controllers\ReviewsController@view');
	$routes->all('/reviews/edit/{id:\d+}', 'App\Modules\Webmaster\Controllers\ReviewsController@edit');
	$routes->all('/reviews/add', 'App\Modules\Webmaster\Controllers\ReviewsController@add');
	$routes->post('/reviews/delete/{id:\d+}', 'App\Modules\Webmaster\Controllers\ReviewsController@delete');

	$routes->get('/banners', 'App\Modules\Webmaster\Controllers\BannersController@index');
	$routes->get('/banners/view/{id:\d+}', 'App\Modules\Webmaster\Controllers\BannersController@view');
	$routes->all('/banners/edit/{id:\d+}', 'App\Modules\Webmaster\Controllers\BannersController@edit');
	$routes->all('/banners/add', 'App\Modules\Webmaster\Controllers\BannersController@add');
	$routes->post('/banners/delete/{id:\d+}', 'App\Modules\Webmaster\Controllers\BannersController@delete');

	return $routes;
});

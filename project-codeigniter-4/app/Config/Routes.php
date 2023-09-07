<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
// $routes->get('/pages', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');

$routes->get('/comics', 'Comics::index');
$routes->get('/comics/create', 'Comics::create');
$routes->post('/comics/save', 'Comics::save');
$routes->get('/comics/(:segment)', 'Comics::detail/$1');

// $routes->get('/coba', 'Coba::index');
// $routes->get('/coba/about', 'Coba::about');
// $routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2');

// $routes->get('/user', 'Admin\Users::index');

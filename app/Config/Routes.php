<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('/riders', 'Main::index');
$routes->get('main/city/(:num)', 'Main::city/$1');



<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('profil', 'Home::profile');
$routes->get('layanan', 'Home::layanan');
$routes->get('galeri', 'Home::galeri');

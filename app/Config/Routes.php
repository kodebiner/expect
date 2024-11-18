<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

service('auth')->routes($routes);

// Backoffice
$routes->group('office', ['filter' => ['chain','group:superadmin,admin']], static function ($routes) {
    service('auth')->routes($routes);
    $routes->get('/', 'Office::index');
});

$routes->get('/', 'Home::index');
$routes->get('profil', 'Home::profile');
$routes->get('layanan', 'Home::layanan');
$routes->get('galeri', 'Home::galeri');

$routes->group('blog', static function ($routes) {
    $routes->get('/', 'Blog::index');
    $routes->get('dummyarticle', 'Blog::dummyarticle');
});
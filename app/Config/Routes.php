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
    $routes->group('client', static function ($routes) {
        $routes->get('/', 'Client::index');
        $routes->post('new', 'Client::new');
        $routes->post('edit/(:num)', 'Client::edit/$1');
        $routes->post('delete', 'Client::delete');
        $routes->post('upload', 'Client::upload');
    });
    $routes->group('agenda', static function ($routes) {
        $routes->get('/', 'Agenda::indexcat');
        $routes->get('edit-agenda-(:num)', 'Agenda::indexeditcat/$1');
        $routes->post('add-category', 'Agenda::createcat');
        $routes->post('edit-category-(:num)', 'Agenda::editcat/$1');
        $routes->get('delete-category-(:num)', 'Agenda::deletecat/$1');
        $routes->post('add-agenda', 'Agenda::createagenda');
        $routes->post('edit-agenda-(:num)', 'Agenda::editagenda/$1');
        $routes->get('delete-agenda-(:num)', 'Agenda::deleteagenda/$1');
    });
    $routes->group('users', static function ($routes) {
        $routes->get('/', 'Users::index');
    });
});

$routes->get('/', 'Home::index');
$routes->get('profil', 'Home::profile');
$routes->get('layanan', 'Home::layanan');
$routes->get('galeri', 'Home::galeri');

$routes->group('blog', static function ($routes) {
    $routes->get('/', 'Blog::index');
    $routes->get('dummyarticle', 'Blog::dummyarticle');
});
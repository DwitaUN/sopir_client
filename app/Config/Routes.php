<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sopir', 'Sopir::index');
$routes->post('/sopir/tambah', 'Sopir::sendData');
$routes->get('/sopir/edit/(:num)', 'Sopir::edit/$1'); 
$routes->post('/sopir/update', 'Sopir::editSopir');
$routes->get('/sopir/hapus/(:num)', 'Sopir::Hapus/$1');
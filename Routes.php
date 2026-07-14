<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Routing CRUD Mata Kuliah
$routes->get('/matakuliah', 'Matakuliah::index');
$routes->get('/matakuliah/tambah', 'Matakuliah::create');
$routes->post('/matakuliah/simpan', 'Matakuliah::store');
$routes->get('/matakuliah/edit/(:segment)', 'Matakuliah::edit/$1');
$routes->post('/matakuliah/update/(:segment)', 'Matakuliah::update/$1');
$routes->get('/matakuliah/hapus/(:segment)', 'Matakuliah::delete/$1');
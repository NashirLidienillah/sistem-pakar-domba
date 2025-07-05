<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::processLogin');
$routes->get('register', 'Auth::register');
$routes->post('register/process', 'Auth::processRegister');
$routes->get('logout', 'Auth::logout');

// Rute yang dilindungi filter
$routes->group('admin', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
// untuk CRUD Gejala
    $routes->get('gejala', 'Admin\Gejala::index');
    $routes->get('gejala/create', 'Admin\Gejala::create');
    $routes->post('gejala/store', 'Admin\Gejala::store');
    $routes->get('gejala/edit/(:num)', 'Admin\Gejala::edit/$1');
    $routes->post('gejala/update/(:num)', 'Admin\Gejala::update/$1');
    $routes->get('gejala/delete/(:num)', 'Admin\Gejala::delete/$1');
// untuk CRUD Penyakit
    $routes->get('penyakit', 'Admin\Penyakit::index');
    $routes->get('penyakit/create', 'Admin\Penyakit::create');
    $routes->post('penyakit/store', 'Admin\Penyakit::store');
    $routes->get('penyakit/edit/(:num)', 'Admin\Penyakit::edit/$1');
    $routes->post('penyakit/update/(:num)', 'Admin\Penyakit::update/$1');
    $routes->get('penyakit/delete/(:num)', 'Admin\Penyakit::delete/$1');
//untuk CRUD Aturan
    $routes->get('aturan', 'Admin\Aturan::index');
    $routes->get('aturan/create', 'Admin\Aturan::create');
    $routes->post('aturan/store', 'Admin\Aturan::store');
    $routes->get('aturan/delete/(:num)', 'Admin\Aturan::delete/$1');
// Rute untuk Riwayat Admin 
    $routes->get('riwayat', 'Riwayat::admin_index');
    $routes->get('riwayat/detail/(:num)', 'Riwayat::admin_detail/$1');
    $routes->get('riwayat/hapus/(:num)', 'Riwayat::hapus/$1');
});

$routes->group('user', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('dashboard', 'User\Dashboard::index');
});

$routes->group('', ['filter' => 'authGuard'], function($routes) {
    // Rute untuk Diagnosa
    $routes->get('diagnosa', 'Diagnosa::index');
    $routes->post('diagnosa/process', 'Diagnosa::process');
// Rute untuk Riwayat
    $routes->get('riwayat', 'Riwayat::index');
    $routes->get('riwayat/detail/(:num)', 'Riwayat::detail/$1');
});
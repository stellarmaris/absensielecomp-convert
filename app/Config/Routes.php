<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/home', 'Home::index');
$routes->get('/signUp', 'AuthController::signUp');
$routes->post('/signUp','AuthController::tambahUser');
$routes->get('/riwayat','historyUserController::riwayat');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');

$routes->get('/izin-form','IzinController::index');
$routes->post('/izin-form','IzinController::store');

$routes-> get('/check-in-form', 'CheckInController::index');
$routes-> post('/check-in-form', 'CheckInController::store');
$routes->get('/checkout', 'CheckoutController::index');
$routes->post('/checkout', 'CheckoutController::checkout');

$routes->get('/lokasiSemua','LokasiController::index');
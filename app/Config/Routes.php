<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'AuthController::login');
$routes->get('/home', 'Home::index');
$routes->get('/signUp', 'AuthController::signUp');
$routes->post('/signUp', 'AuthController::tambahUser');
$routes->get('/riwayat', 'historyUserController::riwayat');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');

$routes->get('/izin-form', 'IzinController::index');
$routes->post('/izin-form', 'IzinController::store');

$routes->get('/check-in-form', 'CheckInController::index');
$routes->post('/check-in-form', 'CheckInController::store');
$routes->get('/checkout', 'CheckoutController::index');
$routes->post('/checkout', 'CheckoutController::checkout');
$routes->get('/success-check-in', 'SuccesCheckInController::index');
$routes->get('/pending-check-in', 'PendingCheckInController::index');
$routes->get('/success-izin', 'SuccesIzinController::index');
$routes->get('/trouble-sign-in', 'TroubleSignInController::index');


$routes->get('/lokasiSemua', 'LokasiController::index');
$routes->get('/logout', 'AuthController::logout');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/Dashboard', 'DashboardUser::index');
$routes->get('/signUp', 'AuthController::signUp');
$routes->post('/signUp','AuthController::tambahUser');
$routes->get('/riwayat','historyUserController::riwayat');

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');


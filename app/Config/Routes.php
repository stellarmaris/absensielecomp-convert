<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/home', 'Home::index');
$routes->get('/signUp', 'AuthController::signUp');
$routes->post('/signUp', 'AuthController::tambahUser');
$routes->get('/riwayat', 'historyUserController::riwayat');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');

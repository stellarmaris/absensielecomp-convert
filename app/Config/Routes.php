<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/Dashboard', 'DashboardUser::index');
$routes->get('/signUp', 'signUpController::signUp');

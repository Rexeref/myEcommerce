<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Login;
use App\Controllers\Prodotti;

$routes->post('login/check', [Login::class, 'challengeResponse']);
$routes->get('login/(:error)', [Login::class, 'challengeResponse']);
$routes->get('login', [Login::class, 'index']);

$routes->post('register/check', [Login::class, 'register']);
$routes->get('register', [Login::class, 'registerForm']);

$routes->get('logout', [Login::class, 'logout']);


$routes->get('/', [Prodotti::class, 'index']);

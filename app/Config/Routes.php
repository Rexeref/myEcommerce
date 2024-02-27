<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Login;
use App\Controllers\Prodotti;

$routes->post('register/check', [Login::class, 'register']);
$routes->get('register', [Login::class, 'registerForm']);

$routes->post('login/check', [Login::class, 'challengeResponse']);
$routes->get('login', [Login::class, 'index']);

$routes->get('logout', [Login::class, 'logout']);

$routes->get('product', [Prodotti::class, 'details']);

$routes->get('/', [Prodotti::class, 'index']);

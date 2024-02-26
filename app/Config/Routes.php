<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Login;
use App\Controllers\Prodotti;

$routes->post('login/check', [Login::class, 'challengeResponse']);
$routes->get('login/(:segment)', [Login::class, 'challengeResponse']);
$routes->get('login', [Login::class, 'index']);

$routes->get('/', [Prodotti::class, 'index']);

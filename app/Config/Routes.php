<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Login;
use App\Controllers\Prodotti;
use App\Controllers\Ordini;

$routes->post('register/check', [Login::class, 'register']);
$routes->get('register', [Login::class, 'registerForm']);

$routes->post('login/check', [Login::class, 'challengeResponse']);
$routes->get('login', [Login::class, 'index']);

$routes->get('logout', [Login::class, 'logout']);

$routes->get('product', [Prodotti::class, 'details']);

$routes->get('cart/add', [Ordini::class, 'addOggettoToCart']);
$routes->get('cart/remove', [Ordini::class, 'removeOggettoFromCart']);
$routes->get('cart/confirm', [Ordini::class, 'carrelloToOrder']);
$routes->get('cart', [Ordini::class, 'seeCarrello']);

$routes->get('search', [Prodotti::class, 'search']);
$routes->get('/', [Prodotti::class, 'listBest']);

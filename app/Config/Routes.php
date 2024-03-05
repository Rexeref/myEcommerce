<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Login;
use App\Controllers\Prodotti;
use App\Controllers\Ordini;


// Account
$routes->post('register/check', [Login::class, 'register']);
$routes->get('register', [Login::class, 'registerForm']);
$routes->post('login/check', [Login::class, 'challengeResponse']);
$routes->get('login', [Login::class, 'index']);
$routes->get('logout', [Login::class, 'logout']);

// Cart
$routes->get('cart/add', [Ordini::class, 'addOggettoToCart']);
$routes->get('cart/remove', [Ordini::class, 'removeOggettoFromCart']);
$routes->get('cart/confirm', [Ordini::class, 'carrelloToOrder']);
$routes->get('cart', [Ordini::class, 'seeCarrello']);

// Special
$routes->post('seller/addProduct/confirm', [Prodotti::class, 'addProductConfirm']);
$routes->get('seller/addProduct', [Prodotti::class, 'addProduct']);
$routes->post('seller/modProduct/confirm', [Prodotti::class, 'addProductConfirm']);
$routes->get('seller/modProduct', [Prodotti::class, 'modifyProduct']);
$routes->get('seller/remProduct/confirm', [Prodotti::class, 'removeProductConfirm']);
$routes->get('seller/remProduct', [Prodotti::class, 'removeProduct']);
$routes->get('admin/roles', [Login::class, 'ruoli']);
$routes->get('admin/users', [Login::class, 'utenti']);

// Navigation
$routes->get('product', [Prodotti::class, 'details']);
$routes->get('search', [Prodotti::class, 'search']);
$routes->get('/', [Prodotti::class, 'listBest']);

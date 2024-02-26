<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Login;
use App\Controllers\Prodotti;

$routes->get('login', 'c_Login::index');
$routes->get('/', 'c_Prodotti::index');

//$routes->get('news', [News::class, 'index']);
//$routes->get('news/(:segment)', [News::class, 'show']);

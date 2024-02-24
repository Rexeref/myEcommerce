<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Prodotti;

$routes->get('/', 'Prodotti::index');

//$routes->get('news', [News::class, 'index']);
//$routes->get('news/(:segment)', [News::class, 'show']);

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Oggetti;

$routes->get('/', 'Oggetti::index');

//$routes->get('news', [News::class, 'index']);
//$routes->get('news/(:segment)', [News::class, 'show']);

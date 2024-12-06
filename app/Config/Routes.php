<?php
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/film/create', 'Film::create');
$routes->get('/film/edit/(:segment)', 'Film::edit/$1');
$routes->delete('/film/(:num)', 'Film::delete/$1');
$routes->get('/film/(:any)', 'Film::detail/$1');
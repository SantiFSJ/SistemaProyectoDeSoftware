<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't h   ave to scan directories.
$routes->get('teams/create', 'TeamController::create');
$routes->get('teams/edit/(:any)', 'TeamController::edit/$1');
$routes->post('teams/save', 'TeamController::save');
$routes->get('teams/delete/(:any)', 'TeamController::delete/$1');
$routes->get('teams/list', 'TeamController::list');

$routes->get('users/create', 'UserController::create');
$routes->get('users/edit/(:any)', 'UserController::edit/$1');
$routes->post('users/save', 'UserController::save');
$routes->get('users/delete/(:any)', 'UserController::delete/$1');
$routes->get('users/list', 'UserController::list');

$routes->get('tournaments/create', 'TournamentController::create');
$routes->get('tournaments/edit/(:any)', 'TournamentController::edit/$1');
$routes->post('tournaments/save', 'TournamentController::save');
$routes->get('tournaments/delete/(:any)', 'TournamentController::delete/$1');
$routes->get('tournaments/list', 'TournamentController::list');

$routes->get('login', 'LoginController::view');
$routes->post('login/login', 'LoginController::login');
$routes->get('login/logout', 'LoginController::logout');
$routes->get('403', 'Error::error403');



$routes->get('news/(:segment)', 'News::view/$1');
$routes->get('news', 'News::index');
$routes->get('pages', 'Pages::index');
$routes->get('home', 'Pages::home');
$routes->get('(:any)', 'Pages::home');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

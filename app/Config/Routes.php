<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\NewPost;
use App\Controllers\AllPost;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Register');
$routes->get('/', 'Register::index', ['filter' => 'guestFilter']);
$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);
 
$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);
 
$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);

$routes->get('/allpost', [AllPost::class, 'index'], ['filter' => 'authFilter']);
$routes->get('/allpost/(:segment)', [AllPost::class, 'index'], ['filter' => 'authFilter']);

$routes->get('/newpost', [NewPost::class, 'new'], ['filter' => 'authFilter']);
$routes->post('/newpost', [NewPost::class, 'create'], ['filter' => 'authFilter']);
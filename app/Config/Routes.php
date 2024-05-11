<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\NewPost;

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

$routes->get('/newpost', [NewPost::class, 'new'], ['filter' => 'authFilter']);
$routes->post('/newpost', [NewPost::class, 'create'], ['filter' => 'authFilter']);

$routes->get('upload', 'Upload::index');          // Add this line.
$routes->post('upload/upload', 'Upload::upload'); // Add this line.
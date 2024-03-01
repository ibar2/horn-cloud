<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/signup', 'Signup::index');
$routes->get('/task', 'Task::index');
$routes->get('/upload', 'Upload::index');
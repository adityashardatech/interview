<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/authenticate', 'Home::login');
$routes->group('admin', ['filter' => 'role:Admin'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('logout', 'Home::logout');
    $routes->get('users', 'Usermanagement::index');
    
});
$routes->group('user', ['filter' => 'customer:Customer'], function($routes) {
    $routes->get('dashboard', 'Dashboard::userDashboard');
    $routes->get('logout', 'Home::logout');
    
});
$routes->group('api', function($routes) {
    $routes->get('users/list', 'UserApiController::usersList');
    $routes->post('create-user', 'UserApiController::createUser');
    $routes->post('get-record', 'UserApiController::getRecords');
    $routes->post('delete-user', 'UserApiController::deleteUser');
});
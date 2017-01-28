<?php

/** @var Router $router */
use Minute\Model\Permission;
use Minute\Routing\Router;

$router->get('/admin/debug', null, 'admin');
$router->get('/admin/debug/phpinfo', 'Admin/Debug@phpinfo', 'admin');
$router->get('/admin/debug/memtest', 'Admin/Debug@memtest', 'admin');
$router->get('/admin/debug/flush', 'Admin/Debug@flushCache', 'admin');
$router->get('/admin/debug/opcache', 'Admin/Debug@opcache', 'admin');
$router->get('/admin/debug/adminer', 'Admin/Debug@adminer', 'admin');

$router->get('/admin/debug/adminer/launch', 'Admin/Debug@launch', 'admin');
$router->post('/admin/debug/adminer/launch', 'Admin/Debug@launch', 'admin');
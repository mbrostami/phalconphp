<?php
use Phalcon\Mvc\View;
use Phalcon\Mvc\Router;

$config = include APP_PATH . '/config/config.php';
$di->setShared('config', $config);


/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($di) {
    $config = $this->getConfig();

    $view = new View();
    $view->setViewsDir($config->viewDir);
    $view->disableLevel(
        array(
            View::LEVEL_LAYOUT => true,
            View::LEVEL_MAIN_LAYOUT => true
        )
    );
    return $view;
});


$di->setShared('router', function () use ($di) {
    $router = new Router();
    $router->clear();
    $router->mount(new \App\Rest\Config\Router(['module' => 'rest', 'namespace' => 'App\Rest\Controllers']));
    $router->mount(new \App\Web\Config\Router(['module' => 'web', 'namespace' => 'App\Web\Controllers']));
    $router->notFound([
        'module' => 'web',
        'controller' => 'errors',
        'action' => 'route404'
    ]);
    $router->setDefaultNamespace('\App\Web\Controllers');
    return $router;
});

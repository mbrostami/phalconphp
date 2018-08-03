<?php
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

define('APP_PATH', realpath('../src/'));
require APP_PATH . '/../vendor/autoload.php';

$di = new FactoryDefault();

include APP_PATH . '/bootstrap.php';

$application = new Application($di);
$application->registerModules(include APP_PATH . '/config/modules.php');
$application->setDefaultModule('web');
$response = $application->handle();
echo $response->getContent();

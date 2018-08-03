<?php
namespace App\Rest;

use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    const NAME = 'rest';

    /**
     * Registers an autoloader related to the module
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
    }

    /**
     * Registers services related to the module
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /** @var Config $moduleConfig */
        $moduleConfig = include __DIR__ . '/config/config.php';
        /** @var Config $appConfig */
        $appConfig = $di->getConfig();
        $appConfig->merge($moduleConfig);
    }

    /**
     * @return string
     */
    public static function getPath()
    {
        return __FILE__;
    }
}

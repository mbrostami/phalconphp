<?php
namespace App\Rest\Config;

use Phalcon\Mvc\Router\Group as RouterGroup;

class Router extends RouterGroup
{
    public function initialize()
    {
        $this->setPrefix('/api');
        $this->addGet('/test', [
            'module' => 'rest',
            'controller' => 'index',
            'action' => 'index'
        ])->setName('api-index');
    }
}

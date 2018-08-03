<?php
namespace App\Web\Config;

use Phalcon\Mvc\Router\Group as RouterGroup;

class Router extends RouterGroup
{
    public function initialize()
    {
        $this->add('/', [
            'module' => 'web',
            'controller' => 'index',
            'action' => 'index',
            'namespace' => 'App\Web\Controllers'
        ])->setName('web-index');
    }
}

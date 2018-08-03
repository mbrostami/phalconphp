<?php
namespace App\Rest\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $d = $this->dataSource;
        // @TODO remove this line
        var_dump($d);
        die();
        
        return [];
    }
}

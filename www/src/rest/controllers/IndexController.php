<?php
namespace App\Rest\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $pagination = $this->pagination->setIterator($this->dataSource->getIterator());
        $pagination->setLimit($this->request->get('limit', 'int', $this->config->pagination->limit))
            ->setPage($this->request->get('page', 'int', 1));
        return $this->response->setJsonContent($pagination->toArrayCurrentPage());
    }
}

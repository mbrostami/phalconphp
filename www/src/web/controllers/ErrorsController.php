<?php
namespace App\Web\Controllers;

class ErrorsController
{
    public function route404Action()
    {
        var_dump('404 here');
        return [];
    }
}

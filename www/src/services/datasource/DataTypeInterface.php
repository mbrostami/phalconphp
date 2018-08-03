<?php
/**
 * Created by PhpStorm.
 * User: mbrostami
 * Date: 8/3/18
 * Time: 3:48 PM
 */
namespace App\Services\Datasource;

interface DataTypeInterface
{
    public function __construct($configs = []);
}

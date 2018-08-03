<?php
namespace App\Services\Datasource\Datatypes;

use App\Services\Datasource\DataTypeInterface;

/**
 * Created by PhpStorm.
 * User: mbrostami
 * Date: 8/3/18
 * Time: 3:44 PM
 */
class Csv implements DataTypeInterface
{
    protected $configs;

    public function __construct($configs = [])
    {
        if (!isset($configs['path'])) {
            throw new \Exception('For Csv adapter, path parameter is required');
        }
        if (!is_file($configs['path'])) {
            throw new \Exception('Csv file is not exists');
        }
        $this->configs = $configs;
    }
}

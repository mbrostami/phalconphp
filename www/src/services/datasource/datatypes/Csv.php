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

    /**
     * @return Iterator
     */
    public function getIterator()
    {
        $this->data = json_decode(file_get_contents($this->configs['path']));
        if (!is_array($this->data)) {
            $this->data = []; // FIXME this should throw an exception
        }
        return new Iterator($this->data);
    }
}

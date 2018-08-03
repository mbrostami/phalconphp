<?php
namespace App\Services\Datasource\Datatypes;

use App\Services\Datasource\DataTypeInterface;
use App\Services\Datasource\Iterator;

/**
 * Created by PhpStorm.
 * User: mbrostami
 * Date: 8/3/18
 * Time: 3:44 PM
 */
class Json implements DataTypeInterface
{
    protected $configs;
    protected $data;

    public function __construct($configs = [])
    {
        if (!isset($configs['path'])) {
            throw new \Exception('For Json adapter, path parameter is required');
        }
        if (!is_file($configs['path'])) {
            throw new \Exception('Json file is not exists');
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

<?php
namespace App\Services\Datasource;

use App\Services\Datasource\Datatypes\Csv;
use App\Services\Datasource\Datatypes\Json;

/**
 * Created by PhpStorm.
 * User: mbrostami
 * Date: 8/3/18
 * Time: 3:44 PM
 */
class DataSourceFactory
{
    const TYPE_JSON = 'json';
    const TYPE_CSV = 'csv';

    /**
     * @param $adater | json / csv / mysql ...
     * @param $configs | adapter configs
     * @return DataTypeInterface
     * @throws \Exception
     */
    public function createDataSourceAdapter($adapter, $configs = [])
    {
        switch ($adapter) {
            case self::TYPE_JSON:
                return new Json($configs);
            case self::TYPE_CSV:
                return new Csv($configs);
            default:
                throw new \Exception('Specified adapter is not valid');
        }
    }
}

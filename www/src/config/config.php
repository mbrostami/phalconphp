<?php
use App\Services\Datasource\DataSourceFactory;

return new \Phalcon\Config([
    'dataSource' => [
        'adapter' => DataSourceFactory::TYPE_JSON,
        'configs' => [
            'path' => APP_PATH . '/data/testtakers.json'
        ]
    ]
]);

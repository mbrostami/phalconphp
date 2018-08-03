<?php

use App\Web\Module as WebModule;
use App\Rest\Module as RestModule;

return [
    WebModule::NAME => [
        'className' => WebModule::class,
        'path' => WebModule::getPath()
    ],
    RestModule::NAME => [
        'className' => RestModule::class,
        'path' => RestModule::getPath()
    ]
];

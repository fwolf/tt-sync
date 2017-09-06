<?php

/**
 * Bootstrap
 *
 *  - Register ClassLoader
 *  - Load default and user config
 *
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */

// Include autoloader
use Fwolf\Tools\TtSync\GlobalConfig;

$classLoader = require __DIR__ . '/vendor/autoload.php';


$config = require __DIR__ . '/config.default.php';

$userConfigFile = __DIR__ . '/config.php';
if (is_readable($userConfigFile)) {
    /** @noinspection PhpIncludeInspection */
    $userConfig = require $userConfigFile;
    $config = array_merge($config, $userConfig);
}

$globalConfig = GlobalConfig::getInstance();
$globalConfig->load($config);

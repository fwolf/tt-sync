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


$configs = require __DIR__ . '/config.default.php';

$userConfigFile = __DIR__ . '/config.php';
if (is_readable($userConfigFile)) {
    /** @noinspection PhpIncludeInspection */
    $userConfigs = require $userConfigFile;
    $configs = array_merge($configs, $userConfigs);
}

$globalConfig = GlobalConfig::getInstance();
$globalConfig->load($configs);

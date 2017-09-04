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
$classLoader = require __DIR__ . '/vendor/autoload.php';


$config = require __DIR__ . '/config.default.php';

$userConfigFile = __DIR__ . '/config.php';
if (is_readable($userConfigFile)) {
    /** @noinspection PhpIncludeInspection */
    $userConfig = require $userConfigFile;
    $config = array_merge($config, $userConfig);
}

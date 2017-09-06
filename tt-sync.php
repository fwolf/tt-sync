#! /usr/bin/env php
<?php

/**
 * Main executable script
 *
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */

use Fwolf\Tools\TtSync\TtSync;

require __DIR__ . '/bootstrap.php';


$ttSync = new TtSync();
$ttSync->run($argv);

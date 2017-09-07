<?php

namespace FwolfTest\Tools\TtSync;

use Fwolf\Tools\TtSync\GlobalConfig;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit_Framework_TestCase as PHPUnitTestCase;

/**
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class GlobalConfigTest extends PHPUnitTestCase
{
    /**
     * @var array
     */
    public static $configBak = [];


    /**
     * @param   string[] $methods
     * @return  MockObject | GlobalConfig
     */
    protected function buildMock(array $methods = null)
    {
        $mock = $this->getMockBuilder(GlobalConfig::class)
            ->setMethods($methods)
            ->getMock();

        return $mock;
    }


    public static function setUpBeforeClass()
    {
        self::$configBak = GlobalConfig::getInstance()->getRaw();
    }


    public static function tearDownAfterClass()
    {
        GlobalConfig::getInstance()->load(self::$configBak);
    }


    public function testAccessors()
    {
        $globalConfig = GlobalConfig::getInstance();

        $configs = [
            GlobalConfig::KEY_SCENE_FROM_PLUGIN  => 'example',
            GlobalConfig::KEY_SCENE_FROM_PROFILE => 'profile1',
            GlobalConfig::KEY_SCENE_FROM_OPTIONS => '',
            GlobalConfig::KEY_SCENE_TO_PLUGIN    => 'example',
            GlobalConfig::KEY_SCENE_TO_PROFILE   => 'profile2',
            GlobalConfig::KEY_SCENE_TO_OPTIONS   => '',
        ];
        $globalConfig->setScenes($configs);
        $this->assertEquals(
            var_export($configs, true),
            var_export($globalConfig->getScenes(), true)
        );
    }
}

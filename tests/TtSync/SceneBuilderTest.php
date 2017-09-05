<?php

namespace FwolfTest\Tools\TtSync;

use Fwolf\Tools\TtSync\GlobalConfig;
use Fwolf\Tools\TtSync\Scene;
use Fwolf\Tools\TtSync\SceneBuilder;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit_Framework_TestCase as PHPUnitTestCase;

/**
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class SceneBuilderTest extends PHPUnitTestCase
{
    /**
     * @param   string[] $methods
     * @return  MockObject | SceneBuilder
     */
    protected function buildMock(array $methods = null)
    {
        $mock = $this->getMockBuilder(SceneBuilder::class)
            ->setMethods($methods)
            ->getMock();

        return $mock;
    }


    public function testBuild()
    {
        $builder = SceneBuilder::getInstance();
        $config = [
            GlobalConfig::KEY_SCENE_FROM_PLUGIN  => 'example',
            GlobalConfig::KEY_SCENE_FROM_PROFILE => 'profile1',
            GlobalConfig::KEY_SCENE_FROM_OPTIONS => '',
            GlobalConfig::KEY_SCENE_TO_PLUGIN    => 'example',
            GlobalConfig::KEY_SCENE_TO_PROFILE   => 'profile2',
            GlobalConfig::KEY_SCENE_TO_OPTIONS   => '',
        ];

        $scene = $builder->build('test', $config);
        $this->assertInstanceOf(Scene::class, $scene);
    }
}

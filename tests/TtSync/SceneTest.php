<?php

namespace FwolfTest\Tools\TtSync;

use Fwolf\Tools\TtSync\Scene;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit_Framework_TestCase as PHPUnitTestCase;

/**
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class SceneTest extends PHPUnitTestCase
{
    /**
     * @param   string[] $methods
     * @return  MockObject | Scene
     */
    protected function buildMock(array $methods = null)
    {
        $mock = $this->getMockBuilder(Scene::class)
            ->setMethods($methods)
            ->getMock();

        return $mock;
    }


    public function testAccessors()
    {
        $scene = new Scene('testScene');

        $scene->setFromPlugin('fromPlugin')
            ->setFromProfile('fromProfile')
            ->setFromOptions('fromOptions')
            ->setToPlugin('toPlugin')
            ->setToProfile('toProfile')
            ->setToOptions('toOptions');

        $this->assertEquals('testScene', $scene->getName());
        $this->assertEquals('fromPlugin', $scene->getFromPlugin());
        $this->assertEquals('fromProfile', $scene->getFromProfile());
        $this->assertEquals('fromOptions', $scene->getFromOptions());
        $this->assertEquals('toPlugin', $scene->getToPlugin());
        $this->assertEquals('toProfile', $scene->getToProfile());
        $this->assertEquals('toOptions', $scene->getToOptions());
    }
}

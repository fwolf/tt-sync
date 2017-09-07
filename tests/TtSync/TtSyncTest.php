<?php

namespace FwolfTest\Tools\TtSync;

use Fwolf\Tools\TtSync\GlobalConfig;
use Fwolf\Tools\TtSync\Scene;
use Fwolf\Tools\TtSync\TtSync;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit_Framework_TestCase as PHPUnitTestCase;

/**
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class TtSyncTest extends PHPUnitTestCase
{
    /**
     * @var array
     */
    private static $scenesBak = [];


    /**
     * @param   string[] $methods
     * @return  MockObject | TtSync
     */
    protected function buildMock(array $methods = null)
    {
        $mock = $this->getMockBuilder(TtSync::class)
            ->setMethods($methods)
            ->getMock();

        return $mock;
    }


    public static function setUpBeforeClass()
    {
        self::$scenesBak = GlobalConfig::getInstance()->getScenes();
    }


    public static function tearDownAfterClass()
    {
        GlobalConfig::getInstance()->setScenes(self::$scenesBak);
    }


    public function testLoadScenes()
    {
        $sceneConfig = [
            GlobalConfig::KEY_SCENE_FROM_PLUGIN  => 'example',
            GlobalConfig::KEY_SCENE_FROM_PROFILE => 'profile1',
            GlobalConfig::KEY_SCENE_FROM_OPTIONS => '',
            GlobalConfig::KEY_SCENE_TO_PLUGIN    => 'example',
            GlobalConfig::KEY_SCENE_TO_PROFILE   => 'profile2',
            GlobalConfig::KEY_SCENE_TO_OPTIONS   => '',
        ];
        GlobalConfig::getInstance()->setScenes([
            'test1' => $sceneConfig,
            'test2' => $sceneConfig,
        ]);

        $sync = new TtSync();

        // Load single
        $closure = function (string $sceneName) {
            /** @noinspection PhpUndefinedMethodInspection */
            return $this->loadScenes(['dummy', 'dummy', $sceneName]);
        };
        $scenes = $closure->call($sync, 'test2');
        $this->assertEquals(1, count($scenes));
        $this->assertInstanceOf(Scene::class, $scenes['test2']);

        // Default to load all
        $closure = function () {
            /** @noinspection PhpUndefinedMethodInspection */
            return $this->loadScenes(['dummy', 'dummy']);
        };
        $scenes = $closure->call($sync);
        $this->assertEquals(2, count($scenes));
        $this->assertInstanceOf(Scene::class, $scenes['test1']);
    }


    public function testRunWithInvalidAction()
    {
        $this->expectOutputRegex('/Invalid action: /');

        $sync = $this->buildMock(['loadScenes']);

        $sync->run(['tt-sync.php', 'invalidAction']);
    }


    public function testRunWithRecentOrAllForSingle()
    {
        $sync = $this->buildMock(['loadScenes', 'sync']);
        $sync->expects($this->exactly(2))
            ->method('sync');

        $sync->run(['tt-sync.php', 'recent', 'sceneName']);
        $sync->run(['tt-sync.php', 'all', 'sceneName']);
    }


    public function testRunWithUnexpectedError()
    {
        $this->expectOutputRegex('/Error: /');

        $sync = $this->buildMock(['loadScenes']);
        $sync->method('loadScenes')
            ->willThrowException(new \Exception);

        $sync->run(['tt-sync.php', 'somethingWrong']);
    }


    public function testRunWithValidateForSingle()
    {
        $sync = $this->buildMock(['loadScenes', 'validate']);
        $sync->expects($this->once())
            ->method('validate');

        $sync->run(['tt-sync.php', 'validate', 'sceneName']);
    }


    public function testRunWithoutParam()
    {
        $this->expectOutputRegex('/Usage/');
        (new TtSync())->run(['tt-sync.php']);
    }
}

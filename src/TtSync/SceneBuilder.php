<?php

namespace Fwolf\Tools\TtSync;

use Fwolf\Base\Singleton\SingleInstanceTrait;
use Fwolf\Tools\TtSync\Exception\InvalidSceneException;

/**
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class SceneBuilder
{
    use SingleInstanceTrait;


    /**
     * @param   string   $name
     * @param   string[] $config
     * @return  Scene
     */
    public function build(string $name, array $config): Scene
    {
        $scene = new Scene($name);

        $scene->setFromPlugin($config[GlobalConfig::KEY_SCENE_FROM_PLUGIN])
            ->setFromProfile($config[GlobalConfig::KEY_SCENE_FROM_PROFILE])
            ->setFromOptions($config[GlobalConfig::KEY_SCENE_FROM_OPTIONS])
            ->setToPlugin($config[GlobalConfig::KEY_SCENE_TO_PLUGIN])
            ->setToProfile($config[GlobalConfig::KEY_SCENE_TO_PROFILE])
            ->setToOptions($config[GlobalConfig::KEY_SCENE_TO_OPTIONS]);

        return $scene;
    }


    /**
     * Load scene array by name
     *
     * @param   string $name Use '*' or leave empty to load all.
     * @return  array
     * @throws  InvalidSceneException
     */
    public function load(string $name = ''): array
    {
        $configs = GlobalConfig::getInstance()->getScenes();

        $scenes = [];

        if (empty($name) || '*' == $name) {
            foreach ($configs as $name => $sceneConfig) {
                $scenes[$name] = $this->build($name, $sceneConfig);
            }

        } else {
            // Single scene
            if (!array_key_exists($name, $configs)) {
                throw new InvalidSceneException("Invalid scene: $name");
            }

            $scenes[$name] = $this->build($name, $configs[$name]);
        }

        return $scenes;
    }
}

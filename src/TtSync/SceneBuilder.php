<?php

namespace Fwolf\Tools\TtSync;

use Fwolf\Base\Singleton\SingleInstanceTrait;

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
}

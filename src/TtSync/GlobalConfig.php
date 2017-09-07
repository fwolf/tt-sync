<?php

namespace Fwolf\Tools\TtSync;

use Fwolf\Config\GlobalConfig as ParentClass;

/**
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class GlobalConfig extends ParentClass
{
    const KEY_SCENES = 'scenes';

    const KEY_SCENE_NAME = 'name';

    const KEY_SCENE_FROM_PLUGIN = 'fromPlugin';

    const KEY_SCENE_FROM_PROFILE = 'fromProfile';

    const KEY_SCENE_FROM_OPTIONS = 'fromOptions';

    const KEY_SCENE_TO_PLUGIN = 'toPlugin';

    const KEY_SCENE_TO_PROFILE = 'toProfile';

    const KEY_SCENE_TO_OPTIONS = 'toOptions';


    /**
     * @return  array
     */
    public function getScenes(): array
    {
        return $this->get(self::KEY_SCENES);
    }


    /**
     * @param   array $configs
     * @return  $this
     */
    public function setScenes(array $configs): self
    {
        $this->set(self::KEY_SCENES, $configs);

        return $this;
    }
}

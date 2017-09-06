<?php

namespace Fwolf\Tools\TtSync;

/**
 * Main executable class
 *
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class TtSync
{
    const VERSION = 'Un-versioned';


    /**
     * Load scenes by cli param
     *
     * @return  Scene[]
     */
    protected function loadScenes()
    {
        global $argc, $argv;

        if (2 < $argc) {
            $sceneName = $argv[2];
        } else {
            $sceneName = '*';
        }

        $builder = SceneBuilder::getInstance();

        return $builder->load($sceneName);
    }


    protected function printUsage()
    {
        $version = self::VERSION;

        echo <<<TAG
TT Sync $version
Usage: tt-sync.php RECENT|ALL|VALIDATE [SCENE_NAME|ALL]

Parameters:
  RECENT|ALL|VALIDATE   RECENT to sync recent messages only.
                        ALL to sync all(most) messages.
                        VALIDATE to check plugins connectivity.
  SCENE_NAME|ALL        Do sync for SCENE_NAME only, or all scenes(default).

TAG;
    }


    /**
     * Main entrance
     */
    public function run()
    {
        global $argc, $argv;

        if (2 > $argc) {
            $this->printUsage();

            return;
        }

        try {
            $scenes = $this->loadScenes();

            $action = strtolower($argv[1]);
            switch ($action) {
                case 'recent':
                case 'all':
                    $this->sync($scenes, $action);
                    break;

                case 'validate':
                    $this->validate($scenes);
                    break;

                default:
                    echo "Invalid action: $action" . PHP_EOL;
            }

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . PHP_EOL;
        }
    }


    /**
     * @param   Scene[] $scenes
     * @param   string  $mode recent or all ?
     */
    protected function sync(array $scenes, string $mode)
    {
    }


    /**
     * @param   Scene[] $scenes
     * Validate scene relate plugin connectivity
     */
    protected function validate(array $scenes)
    {
    }
}

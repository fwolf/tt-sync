<?php

namespace Fwolf\Tools\TtSync;

/**
 * @copyright   Copyright 2017 Fwolf
 * @license     https://opensource.org/licenses/MIT MIT
 */
class Scene
{
    /**
     * Other options of source
     *
     * @var string
     */
    protected $fromOptions = '';

    /**
     * Plugin name of sync source
     *
     * @var string
     */
    protected $fromPlugin = '';

    /**
     * Profile to login source
     *
     * @var string
     */
    protected $fromProfile = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $toOptions = '';

    /**
     * Plugin name of sync destination
     *
     * @var string
     */
    protected $toPlugin = '';

    /**
     * @var string
     */
    protected $toProfile = '';


    /**
     * @param   string $name
     */
    public function __construct(string $name = '')
    {
        if (!empty($name)) {
            $this->setName($name);
        }
    }


    /**
     * @return string
     */
    public function getFromOptions(): string
    {
        return $this->fromOptions;
    }


    /**
     * @return  string
     */
    public function getFromPlugin(): string
    {
        return $this->fromPlugin;
    }


    /**
     * @return  string
     */
    public function getFromProfile(): string
    {
        return $this->fromProfile;
    }


    /**
     * @return  string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return  string
     */
    public function getToOptions(): string
    {
        return $this->toOptions;
    }


    /**
     * @return  string
     */
    public function getToPlugin(): string
    {
        return $this->toPlugin;
    }


    /**
     * @return  string
     */
    public function getToProfile(): string
    {
        return $this->toProfile;
    }


    /**
     * @param   string $fromOptions
     * @return  $this
     */
    public function setFromOptions(string $fromOptions): Scene
    {
        $this->fromOptions = $fromOptions;

        return $this;
    }


    /**
     * @param   string $fromPlugin
     * @return  $this
     */
    public function setFromPlugin(string $fromPlugin): Scene
    {
        $this->fromPlugin = $fromPlugin;

        return $this;
    }


    /**
     * @param   string $fromProfile
     * @return  $this
     */
    public function setFromProfile(string $fromProfile): Scene
    {
        $this->fromProfile = $fromProfile;

        return $this;
    }


    /**
     * @param   string $name
     * @return  $this
     */
    public function setName(string $name): Scene
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @param   string $toOptions
     * @return  $this
     */
    public function setToOptions(string $toOptions): Scene
    {
        $this->toOptions = $toOptions;

        return $this;
    }


    /**
     * @param   string $toPlugin
     * @return  $this
     */
    public function setToPlugin(string $toPlugin): Scene
    {
        $this->toPlugin = $toPlugin;

        return $this;
    }


    /**
     * @param   string $toProfile
     * @return  $this
     */
    public function setToProfile(string $toProfile): Scene
    {
        $this->toProfile = $toProfile;

        return $this;
    }
}

<?php

namespace PhpWatson\Sdk;

use PhpWatson\Sdk\Interfaces\ServiceInterface;

class Service implements ServiceInterface
{
    /**
     * Base url for the service
     * @var string
     */
    protected $url;

    /**
     * API version
     * @var string
     */
    protected $version;

    /**
     * Default request Options
     * @var array
     */
    protected $options = [];

    /**
     * Sdk client
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function getMountedUrl()
    {
        $url = $this->normalizeUrlEndBar($this->getUrl());
        $version = $this->normalizeUrlEndBar($this->getVersion());

        return $url.$version;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * {@inheritdoc}
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Normalize an url string
     *
     * If not end with '/', add then
     *
     * @param $string
     * @return string
     */
    protected function normalizeUrlEndBar($string) {
        return (substr($string, -1) != '/') ? $string.'/': $string;
    }
}
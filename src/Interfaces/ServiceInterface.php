<?php

namespace PhpWatson\Sdk\Interfaces;

interface ServiceInterface
{
    /**
     * Get the current url
     */
    public function getUrl();

    /**
     * Join the url with version
     */
    public function getMountedUrl();

    /**
     * Set the url for the service api
     *
     * @param string $url
     */
    public function setUrl($url);

    /**
     * Get the api version
     *
     */
    public function getVersion();

    /**
     * Set the api version
     *
     * @param string $version
     */
    public function setVersion($version);
    
    /**
     * Get the HTTP client
     */
    public function getClient();
}
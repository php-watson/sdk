<?php

namespace PhpWatson\Sdk\Interfaces;

use GuzzleHttp\Client as GuzzleClient;

interface ClientInterface
{
    /**
     * Make a HTTP request
     *
     * @param $method
     * @param $uri
     * @param $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request($method, $uri, $options = []);

    /**
     * Set the current Guzzle instance
     * 
     * @param GuzzleClient $guzzle
     * @return
     * @internal param GuzzleClient $client
     */
    public function setGuzzleInstance(GuzzleClient $guzzle);

    /**
     * Get the client options
     *
     * @return array
     */
    public function getOptions();


    /**
     *  Set the client options merging and/or overwriting its contents
     *
     * @param array $options
     * @return null
     */
    public function setOptions(array $options);
}
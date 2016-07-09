<?php

namespace PhpWatson\Sdk;

use GuzzleHttp\Client as GuzzleClient;
use PhpWatson\Sdk\Interfaces\ClientInterface;

class Client implements ClientInterface{
    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    public function __construct()
    {
        $this->guzzle = new GuzzleClient();
    }

    /**
     * {@inheritdoc}
     */
    public function request($method, $uri, $options = [])
    {
        return $this->guzzle->request($method, $uri, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function setGuzzleInstance(GuzzleClient $guzzle)
    {
        $this->guzzle = $guzzle;
    }
}
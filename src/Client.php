<?php

namespace PhpWatson\Sdk;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use PhpWatson\Sdk\Interfaces\ClientInterface;

class Client implements ClientInterface{
    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    /**
     * @var Response
     */
    private $response;



    public function __construct()
    {
        $this->guzzle = new GuzzleClient();
        $this->response = new Response();
    }

    /**
     * {@inheritdoc}
     */
    public function request($method, $uri, $options = [])
    {
        return $this->response->parse($this->guzzle->request($method, $uri, array_merge(['exceptions' => false], $options)));
    }

    /**
     * {@inheritdoc}
     */
    public function setGuzzleInstance(GuzzleClient $guzzle)
    {
        $this->guzzle = $guzzle;
    }
}
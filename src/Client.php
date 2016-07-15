<?php

namespace PhpWatson\Sdk;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use PhpWatson\Sdk\Interfaces\ClientInterface;

class Client implements ClientInterface
{
    /**
     * The client request options
     *
     * @var array
     */
    private $options = [
        'exceptions' => false,
        'headers' => [
            'Accept' => 'application/json'
        ]
    ];

    /**
     * The Guzzle instance
     *
     * @var \GuzzleHttp\Client
     */
    private $guzzle;


    /**
     * @var Response
     */
    private $response;

    public function __construct($username, $password)
    {
        if ($username != null && $password != null)
            $this->setOptions(['auth' => [$username, $password]]);

        $this->setGuzzleInstance(new GuzzleClient());
        $this->response = new Response();
    }

    /**
     * {@inheritdoc}
     */
    public function request($method, $uri, $options = [])
    {
        return $this->response->parse($this->guzzle->request($method, $uri, array_merge($this->getOptions(), $options)));
    }

    /**
     * {@inheritdoc}
     */
    public function setGuzzleInstance(GuzzleClient $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->getOptions(), $options);
    }
}
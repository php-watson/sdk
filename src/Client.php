<?php

namespace PhpWatson\Sdk;

use GuzzleHttp\Client as GuzzleClient;
use PhpWatson\Sdk\Interfaces\ClientInterface;
use PhpWatson\Sdk\Interfaces\ResponseInterface;

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
     * The SDK response instance
     *
     * @var ResponseInterface
     */
    private $response;

    public function __construct($username, $password)
    {
        if ($username != null && $password != null)
            $this->setOptions(['auth' => [$username, $password]]);

        $this->setGuzzleInstance(new GuzzleClient());
        $this->setResponse(new Response());
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

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * {@inheritdoc}
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
    }
}
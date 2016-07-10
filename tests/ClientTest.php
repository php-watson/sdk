<?php

namespace PhpWatson\Sdk\Tests;

use PhpWatson\Sdk\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;

class ClientTest extends AbstractTestCase
{
    public $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = new Client();
    }

    public function test_client_request()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], 'FooBar')
        ]);
        $this->client->setGuzzleInstance(new \GuzzleHttp\Client(['handler' => HandlerStack::create($mock), 'exceptions' => false ]));
        
        $response = $this->client->request('GET', '/');

        $this->assertEquals(['X-Foo' => [0 => 'Bar']], $response->getHeaders());
        $this->assertEquals('FooBar', $response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
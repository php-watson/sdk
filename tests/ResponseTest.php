<?php

namespace PhpWatson\Sdk\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use PhpWatson\Sdk\Response;

class ResponseTest extends AbstractTestCase
{
    /**
     * @var Response
     */
    public $response;

    public function setUp()
    {
        parent::setUp();
        $this->response = new Response();
    }

    public function test_can_parse_response_headers()
    {
        $mock = new MockHandler([
            new \GuzzleHttp\Psr7\Response(200, ['X-Foo' => 'Bar'], null)
        ]);

        $client = new \GuzzleHttp\Client(['handler' => HandlerStack::create($mock) ]);
        
        $this->response->parse($client->request('GET', '/'));

        $this->assertEquals(['X-Foo' => [0 => 'Bar']], $this->response->getHeaders());
    }

    public function test_can_parse_response_content()
    {
        $mock = new MockHandler([
            new \GuzzleHttp\Psr7\Response(200, [], '{"foo": "bar"}')
        ]);

        $client = new \GuzzleHttp\Client(['handler' => HandlerStack::create($mock) ]);

        $this->response->parse($client->request('GET', '/'));

        $this->assertEquals('{"foo": "bar"}', $this->response->getContent());
        $this->assertEquals(['foo' => 'bar'], json_decode($this->response->getContent(), true));
        $this->assertTrue($this->response->isSuccess());
        $this->assertFalse($this->response->isError());
    }

    public function test_can_parse_an_error_response()
    {
        $mock = new MockHandler([
            new \GuzzleHttp\Psr7\Response(400, [], '{"msg":"WRRCSR014: Error message example","code":400}')
        ]);

        $client = new \GuzzleHttp\Client(['handler' => HandlerStack::create($mock), 'exceptions' => false ]);

        $this->response->parse($client->request('GET', '/'));

        $this->assertEquals(400, $this->response->getStatusCode());
        $this->assertArraySubset(['code' => 400], json_decode($this->response->getContent(), true));
        $this->assertTrue($this->response->isError());
        $this->assertFalse($this->response->isSuccess());
    }
}
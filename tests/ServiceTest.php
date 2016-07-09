<?php

namespace PhpWatson\Sdk\Tests;


use PhpWatson\Sdk\Client;
use PhpWatson\Sdk\Service;

class ServiceTest extends AbstractTestCase
{
    public $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new Service();
    }

    public function test_get_set_url()
    {
        $this->service->setUrl('http://example.app');

        $this->assertEquals('http://example.app', $this->service->getUrl());
    }
    
    public function test_get_set_version()
    {
        $this->service->setVersion('v1');

        $this->assertEquals('v1', $this->service->getVersion());
    }

    public function test_get_http_client()
    {
        $this->assertInstanceOf(Client::class, $this->service->getClient());
    }

    public function test_get_url_for_request()
    {
        $this->service
            ->setUrl('http://example.app')
            ->setVersion('v1');

        $this->assertEquals('http://example.app/v1/', $this->service->getMountedUrl());
    }
}
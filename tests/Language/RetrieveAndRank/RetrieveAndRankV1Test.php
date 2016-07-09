<?php

namespace PhpWatson\Sdk\Tests\Language\RetrieveAndRank;

use PhpWatson\Sdk\Tests\AbstractTestCase;
use PhpWatson\Sdk\Language\RetrieveAndRank\V1\RetrieveAndRankService;

class RetrieveAndRankV1Test extends AbstractTestCase
{
    /**
     * @var RetrieveAndRankService
     */
    public $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new RetrieveAndRankService();
    }

    public function test_if_url_is_set()
    {
        $this->assertEquals(
            'https://watson-api-explorer.mybluemix.net/retrieve-and-rank/api',
            $this->service->getUrl()
        );
    }

    public function test_if_version_is_set()
    {
        $this->assertEquals(
            'v1',
            $this->service->getVersion()
        );
    }

    public function test_can_list_solr_clusters()
    {
        $response = $this->service->listSolrClusters();

        $this->assertArrayHasKey('clusters', json_decode($response->getBody()->getContents(), true));
    }
}
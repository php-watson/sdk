<?php
namespace PhpWatson\Sdk\Language\RetrieveAndRank\V1;

use PhpWatson\Sdk\Service;

class RetrieveAndRankService extends Service
{
    /**
     * {@inheritdoc}
     */
    protected $url = "https://watson-api-explorer.mybluemix.net/retrieve-and-rank/api";

    /**
     * {@inheritdoc}
     */
    protected $version = 'v1';

    /**
     * {@inheritdoc}
     */
    protected $options = [];

    /**
     * Get the Solr Clusters
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listSolrClusters()
    {
        return $this->client->request('GET', $this->getMountedUrl().'/solr_clusters');
    }
}
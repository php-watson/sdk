<?php
namespace PhpWatson\Sdk\Language\ToneAnalyser\V3;

use PhpWatson\Sdk\Service;

class ToneAnalyserService extends Service
{
    /**
     * {@inheritdoc}
     */
    protected $url = "https://watson-api-explorer.mybluemix.net/tone-analyzer/api";

    /**
     * {@inheritdoc}
     */
    protected $version = 'v3';

    /**
     * {@inheritdoc}
     */
    protected $options = [];

    /**
     * Analyzes the tone of a piece of text
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function plainText($textToAnalyse, $version='2016-05-19')
    {
        return $this->client->request('GET', $this->getMountedUrl().'/tone', ['query' => ['version' => $version, 'text' => $textToAnalyse]]);
    }
}
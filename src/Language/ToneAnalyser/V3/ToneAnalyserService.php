<?php
namespace PhpWatson\Sdk\Language\ToneAnalyser\V3;

use PhpWatson\Sdk\Service;

class ToneAnalyserService extends Service
{
    /**
     * Base url for the service
     *
     * @var string
     */
    protected $url = "https://gateway.watsonplatform.net/tone-analyzer/api";

    /**
     * API service version
     *
     * @var string
     */
    protected $version = 'v3';

    /**
     * ToneAnalyserService constructor
     *
     * @param $username string The service api username
     * @param $password string The service api password
     */
    public function __construct($username, $password)
    {
        parent::__construct($username, $password);
    }

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
<?php

namespace PhpWatson\Sdk;

use PhpWatson\Sdk\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     * The response headers
     * @var array
     */
    private $headers = [];

    /**
     * The response content
     * @var string
     */
    private $content;

    /**
     * The response status code
     * @var int
     */
    private $statusCode;

    /**
     * @var bool
     */
    private $isError = false;

    /**
     * {@inheritdoc}
     */
    public function parse(\GuzzleHttp\Psr7\Response $response)
    {
        $this->setHeaders($response->getHeaders());
        $this->setStatusCode($response->getStatusCode());
        $this->setContent($response->getBody()->getContents());
        if ($this->getStatusCode() != 200)
            $this->setIsError(true);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isError()
    {
        return $this->isError;
    }

    /**
     * {@inheritdoc}
     */
    public function isSuccess()
    {
        return ($this->getStatusCode() === 200 && $this->isError() == false) ? true : false;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @param boolean $isError
     */
    public function setIsError($isError)
    {
        $this->isError = $isError;
    }
}
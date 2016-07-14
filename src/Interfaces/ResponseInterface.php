<?php

namespace PhpWatson\Sdk\Interfaces;

use GuzzleHttp\Psr7\Response;

interface ResponseInterface
{
    /**
     * Parse an incoming PSR7 response
     *
     * @param Response $response
     * @return mixed
     */
    public function parse(Response $response);

    /**
     * Return true if the request produces an error
     *
     * @return bool
     */
    public function isError();

    /**
     * Return true if the request is successfully completed
     *
     * @return bool
     */
    public function isSuccess();

    public function getContent();

    public function setContent($content);

    public function getHeaders();

    public function setHeaders($headers);

    public function getStatusCode();

    public function setStatusCode($statusCode);

    public function setIsError($isError);
}
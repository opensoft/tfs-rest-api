<?php
/**
 * This file is part of opensoft/tfs-rest-api.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\Tfs\Rest;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class ClientHelper
{
    /**
     * @var GuzzleClient
     */
    private $client;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $collection;

    /**
     * @param string $baseUrl
     * @param string $collection
     * @param array $options
     */
    public function __construct($baseUrl, $collection, array $options = [])
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->collection = $collection;
        $this->client = new GuzzleClient($options);
    }

    /**
     * @param string $url
     * @param array $options
     * @throws GuzzleException
     * @return Response
     */
    public function get($url, array $options = [])
    {
        if (strpos($url, 'http') !== 0) {
            $url = $this->baseUrl . '/' . $this->collection . '/' . ltrim($url, '/');
        }

        return new Response($this, $this->client->get($url, $options));
    }

    /**
     * @param string $url
     * @param array $options
     * @throws GuzzleException
     * @return Response
     */
    public function patch($url, array $options = [])
    {
        if (strpos($url, 'http') !== 0) {
            $url = $this->baseUrl . '/' . $this->collection . '/' . ltrim($url, '/');
        }

        return new Response($this, $this->client->patch($url, $options));
    }
}

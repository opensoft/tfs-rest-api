<?php
/**
 * This file is part of opensoft/tfs-rest-api.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\Tfs\Rest;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Response
{
    /**
     * @var ClientHelper
     */
    private $clientHelper;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ClientHelper $clientHelper
     * @param ResponseInterface $response
     */
    public function __construct(ClientHelper $clientHelper, ResponseInterface $response)
    {
        $this->clientHelper = $clientHelper;
        $this->response = $response;
    }

    /**
     * Retrieve the json encoded response as a php associative array
     *
     * @return array
     */
    public function asArray()
    {
        $stream = $this->response->getBody();
        if ($stream->eof()) {
            $stream->rewind();
        }

        return json_decode($stream->getContents(), true);
    }

    /**
     * Follow a response _link by its name
     *
     * @param string $link
     * @param array $options
     * @throws GuzzleException
     * @throws \RuntimeException
     * @return Response
     */
    public function follow($link, array $options = [])
    {
        $responseArray = $this->asArray();
        if (!isset($responseArray['_links'])) {
            throw new \RuntimeException('Response does not contain any _links');
        }

        if (!isset($responseArray['_links'][$link])) {
            throw new \RuntimeException(sprintf('Response _links %s not found', $link));
        }

        $url = $responseArray['_links'][$link]['href'];

        return $this->clientHelper->get($url, $options);
    }
}

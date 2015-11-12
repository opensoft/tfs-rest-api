<?php
/**
 * This file is part of opensoft/tfs-rest-api.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\Tfs\Rest\Api;

use GuzzleHttp\Exception\GuzzleException;
use Opensoft\Tfs\Rest\Response;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class WorkItemTracking extends AbstractApi
{

    /**
     * Retrieve a work item from the collection
     *
     * @see https://www.visualstudio.com/integrate/api/wit/work-items#Getaworkitem
     *
     * @param integer $id
     * @param string $expand
     * @throws GuzzleException
     * @return Response
     */
    public function getWorkItem($id, $expand = 'none')
    {
        return $this->clientHelper->get('/_apis/wit/workitems/' . $id, [
            'query' => [
                'api-version' => '1.0',
                '$expand' => $expand
            ]
        ]);
    }

    /**
     * Update a work item
     *
     * @see https://www.visualstudio.com/integrate/api/wit/work-items#Updateworkitems
     *
     * @param integer $id
     * @param array $operations
     * @throws GuzzleException
     * @return Response
     */
    public function patchWorkItem($id, $operations)
    {
        return $this->clientHelper->patch('/_apis/wit/workitems/' . $id, [
            'query' => [
                'api-version' => '1.0'
            ],
            'json' => $operations,
            'headers' => [
                // set their custom content type
                'Content-Type' => 'application/json-patch+json'
            ]
        ]);
    }
}

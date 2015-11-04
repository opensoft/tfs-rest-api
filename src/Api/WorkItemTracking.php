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
}

<?php
/**
 * This file is part of opensoft/tfs-rest-api.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\Tfs\Rest;

use Opensoft\Tfs\Rest\Api\WorkItemTracking;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class Client
{
    /**
     * @var ClientHelper
     */
    protected $clientHelper;

    /**
     * @param string $baseUrl
     * @param string $collection
     * @param array $options
     */
    public function __construct($baseUrl, $collection, array $options = [])
    {
        $this->clientHelper = new ClientHelper($baseUrl, $collection, $options);
    }

    /**
     * Use the work item tracking API
     *
     * @see https://www.visualstudio.com/integrate/api/wit/work-items
     *
     * @return WorkItemTracking
     */
    public function workItemTracking()
    {
        return new WorkItemTracking($this->clientHelper);
    }
}

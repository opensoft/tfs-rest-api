<?php
/**
 * This file is part of opensoft/tfs-rest-api.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\Tfs\Rest\Api;

use Opensoft\Tfs\Rest\ClientHelper;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class AbstractApi
{
    /**
     * @var ClientHelper
     */
    protected $clientHelper;

    /**
     * @param ClientHelper $clientHelper
     */
    public function __construct(ClientHelper $clientHelper)
    {
        $this->clientHelper = $clientHelper;
    }
}

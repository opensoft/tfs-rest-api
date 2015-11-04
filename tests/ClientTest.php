<?php
/**
 * This file is part of opensoft/tfs-rest-api.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

use Opensoft\Tfs\Rest\Client;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGetWorkItem()
    {
        $client = new Client(
            'https://example.visualstudio.com',
            'AcmeApp',
            ['curl' => [CURLOPT_HTTPAUTH => CURLAUTH_NTLM, CURLOPT_USERPWD => 'redacted:redacted']]
        );

        $response = $client->workItemTracking()->getWorkItem(25746, 'all');

        print_r($response->asArray());

        $response = $response->follow('workItemUpdates');

        print_r($response->asArray());
    }
}

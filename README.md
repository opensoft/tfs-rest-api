PHP TFS Rest Api
================

A simple object oriented wrapper for the [Visual Studio Online / Team Foundation Server REST API](https://www.visualstudio.com/en-us/integrate/api/overview) in PHP 5.5

Uses Guzzle 6 for REST requests.

Installation
------------

Installable through composer via:

    $ composer require opensoft/tfs-rest-api
    
Basic Usage
-----------

```php
<?php

use Opensoft\Tfs\Rest\Client;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client(
    // your tfs/vso
    'https://opensoft.visualstudio.com',
    // your collection
    'AcmeApp',
    // (optional) raw options to pass to guzzle (ntlm example here)
    [                                      
        'curl' => [
            CURLOPT_HTTPAUTH => CURLAUTH_NTLM, 
            CURLOPT_USERPWD => 'username:password'
        ]
    ]
);

// retrieve a work item by its ID
$response = $client->workItemTracking()->getWorkItem(12345);

// get the result as an array
print_r($response->asArray());

// follow hypermedia links
$response = $response->follow('workItemHistory');

print_r($response->asArray());
```

**Caution:** There are many more APIs exposed by TFS/VSO than are implemented here.  We've implemented only what we've needed internally for now, and will implement more as the need arises.  Feel free to submit pull requests implementing more APIs and we'll be happy to merge them.

License
-------

Licensed under the MIT License - see the LICENSE file for details

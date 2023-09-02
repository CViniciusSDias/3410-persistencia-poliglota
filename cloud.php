<?php

declare(strict_types=1);

use Aws\DynamoDb\DynamoDbClient;

require_once 'vendor/autoload.php';

$dynamo = new DynamoDbClient([
    'region' => 'us-east-1',
    'credentials' => require_once 'credentials.php',
]);

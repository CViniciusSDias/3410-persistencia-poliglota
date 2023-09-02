<?php

declare(strict_types=1);

use Aws\DynamoDb\DynamoDbClient;

require_once 'vendor/autoload.php';

$dynamo = new DynamoDbClient([
    'region' => 'us-east-1',
    'credentials' => require_once 'credentials.php',
]);

/*$result = $dynamo->putItem([
    'TableName' => 'Product_Catalog',
    'Item' => [
        'Id' => ['S' => '1'],
        'Name' => ['S' => 'TV Fictícia'],
        'Descricao' => ['S' => 'Uma TV muito bonita'],
        'Polegadas' => ['N' => '42']
    ],
]);

var_dump($result);*/

$result = $dynamo->query([
    'ExpressionAttributeValues' => [
        ':id' => [
            'S' => '1',
        ],
    ],
    'KeyConditionExpression' => 'Id = :id',
    'TableName' => 'Product_Catalog',
]);

var_dump($result->get('Items'));
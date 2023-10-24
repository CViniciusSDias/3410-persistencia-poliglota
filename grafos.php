<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$client = \Laudis\Neo4j\ClientBuilder::create()
    ->withDriver('bolt', 'bolt://neo4j:12345678@grafos:7687')
    ->withDefaultDriver('bolt')
    ->build();

var_dump($client->verifyConnectivity());

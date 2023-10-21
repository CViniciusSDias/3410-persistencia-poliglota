<?php

declare(strict_types=1);

$cluster = Cassandra::cluster()
    ->withContactPoints('colunares')
    ->build();

$session = $cluster->connect('e_commerce');

var_dump($session);
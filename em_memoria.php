<?php

declare(strict_types=1);

$memcached = new Memcached();
$memcached->addServer('em_memoria', 11211);
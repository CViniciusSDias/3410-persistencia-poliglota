<?php

declare(strict_types=1);

$memcached = new Memcached();
$memcached->addServer('em_memoria', 11211);

// $memcached->set('chave', 'Valor 2', 10);

echo $memcached->get('chave');
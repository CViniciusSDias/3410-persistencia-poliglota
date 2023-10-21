<?php

declare(strict_types=1);

$cluster = Cassandra::cluster()
    ->withContactPoints('colunares')
    ->build();

$session = $cluster->connect('e_commerce');

/*$statement = $session->prepare('INSERT INTO products (product_id, name, price) VALUES (?, ?, ?);');
$rows = $session->execute($statement, [
    'arguments' => [
        'product_id' => 1,
        'name' => 'Produto',
        'price' => 1000_00,
    ]
]);*/


$rows = $session->execute('SELECT * FROM products;');

var_dump($rows);

foreach ($rows as $row) {
    var_dump($row);
}


/**
 * 1,"Produto",100000
 * 2,"Outro produto",50000
 */

/**
 * 1,2
 * "Produto","Outro produto"
 * 100000,50000
 */
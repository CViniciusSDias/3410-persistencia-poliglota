<?php

declare(strict_types=1);

use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Contracts\TransactionInterface;
use Laudis\Neo4j\Databags\Statement;

require_once 'vendor/autoload.php';

$client = ClientBuilder::create()
    ->withDriver('bolt', 'bolt://neo4j:12345678@grafos:7687')
    ->withDefaultDriver('bolt')
    ->build();

/* var_dump($client->verifyConnectivity());
$result = $client->run('CREATE (u:Usuario {nome: $nome})', ['nome' => 'Vinicius']);

$client->writeTransaction(static function (TransactionInterface $transaction) {
    $transaction->runStatements([
        Statement::create('CREATE (u:Usuario {nome: $nome})', ['nome' => 'Patricia']),
        Statement::create('CREATE (u:Usuario {nome: $nome})', ['nome' => 'Rafaela']),
    ]);
});
*/

$client->writeTransaction(static function (TransactionInterface $transaction) {
    $transaction->runStatements([
        Statement::create(
            'MATCH (vinicius:Usuario {nome: "Vinicius"}), (patricia:Usuario {nome: "Patricia"}) CREATE (vinicius)-[:AMIZADE]->(patricia)'
        ),
        Statement::create(
            'MATCH (patricia:Usuario {nome: "Patricia"}), (rafaela:Usuario {nome: "Rafaela"}) CREATE (patricia)-[:AMIZADE]->(rafaela)'
        ),
    ]);
});

$result = $client->readTransaction(static function (TransactionInterface $transaction) {
    return $transaction->run(
        'MATCH (vinicius:Usuario {nome: "Vinicius"})-[:AMIZADE*2..3]-(sugestao:Usuario)
                WHERE NOT (vinicius)-[:AMIZADE]-(sugestao)
                RETURN sugestao.nome'
    );
});

/** @var \Laudis\Neo4j\Types\CypherMap $item */
foreach ($result as $item) {
    echo $item->get('sugestao.nome');
}

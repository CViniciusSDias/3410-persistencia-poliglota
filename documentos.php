<?php

declare(strict_types=1);

use MongoDB\BSON\ObjectId;
use MongoDB\Client;

require_once 'vendor/autoload.php';

$mongodb = new Client('mongodb://usuario:senha@documentos');
$database = $mongodb->selectDatabase('e_commerce');

$colecaoDeProdutos = $database->selectCollection('produtos');
/*$resultado = $colecaoDeProdutos->insertOne([
    'name' => 'TV Fictícia',
    'descricao' => 'Uma TV muito bonita',
    'polegadas' => 40
]);

echo "Foram inseridos {$resultado->getInsertedCount()} itens. Id da última inserção: {$resultado->getInsertedId()}";
*/

$produto = $colecaoDeProdutos->findOne([
    '_id' => new ObjectId('64f390cc390d1dbe5e050d62')
]);

echo "Essa TV tem {$produto->polegadas} polegadas";
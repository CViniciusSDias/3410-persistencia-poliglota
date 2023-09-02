<?php

declare(strict_types=1);

use MongoDB\Client;

require_once 'vendor/autoload.php';

$mongodb = new Client('mongodb://usuario:senha@documentos');
$database = $mongodb->selectDatabase('e_commerce');

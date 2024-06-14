<?php

require __DIR__.'/vendor/autoload.php';

define('PG', 'Leitores');

use \App\Entity\Cliente;

$clientes = Cliente::getCliente();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagemclientes.php';
include __DIR__ . '/includes/footer.php';
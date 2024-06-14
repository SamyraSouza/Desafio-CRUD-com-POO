<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Cliente;
define('PG', 'Leitores');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: listagemClientes.php?status=error');
    exit;
}

$obCliente= Cliente::getCli($_GET['id']);

if(!$obCliente instanceof Cliente){
    header('location: listagemClientes.php?status=error');
    exit;
}


if(isset($_POST['excluirCliente'])){

    $obCliente->excluirCliente();

    header('location: listagemClientes.php');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/exclusaoClientes.php';
include __DIR__ . '/includes/footer.php';
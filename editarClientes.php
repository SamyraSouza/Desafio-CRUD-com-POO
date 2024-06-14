<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Cliente;
define('TITLE', 'Editar Leitores');
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

if(isset($_POST['Nome'],$_POST['Contato'])){

    $obCliente->Nome = $_POST['Nome'];
    $obCliente->Contato = $_POST['Contato'];
  
    $obCliente->atualizar();
    

    header('location: listagemClientes.php?status=success');
    exit;
}



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioclientes.php';
include __DIR__ . '/includes/footer.php';
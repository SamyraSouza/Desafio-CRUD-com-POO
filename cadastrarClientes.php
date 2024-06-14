<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Cliente;

define('TITLE', 'Cadastar Leitor');
define('PG', 'Leitores');
// echo"<pre>";print_r($_POST); echo"</pre>";exit;

 $obCliente = new Cliente;

if(isset($_POST['Nome'],$_POST['Contato'])){
   
    $obCliente->Nome = $_POST['Nome'];   
    $obCliente->Contato = $_POST['Contato'];


    $obCliente->cadastrar();
    

    header('location: listagemClientes.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioclientes.php';
include __DIR__ . '/includes/footer.php';
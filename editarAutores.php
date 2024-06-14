<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Autor;
define('TITLE', 'Editar Autor');
define('PG', 'Autores');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: listagemAutores.php?status=error');
    exit;
}

$obAutor= Autor::getAut($_GET['id']);

if(!$obAutor instanceof Autor){
    header('location: listagemAutores.php?status=error');
    exit;
}

if(isset($_POST['Nome'],$_POST['DataNasc'],$_POST['Biografia'])){

    $obAutor->Nome = $_POST['Nome'];
    $obAutor->DataNasc = $_POST['DataNasc'];
    $obAutor->Biografia = $_POST['Biografia'];
    $obAutor->atualizar();
    

    header('location: listagemAutores.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioautores.php';
include __DIR__ . '/includes/footer.php';
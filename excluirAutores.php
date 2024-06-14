<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Autor;
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


if(isset($_POST['excluirAutor'])){

    $obAutor->excluirAutor();

    header('location: listagemAutores.php');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/exclusaoAutores.php';
include __DIR__ . '/includes/footer.php';
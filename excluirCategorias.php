<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Categoria;
use \App\Entity\Livro;
use \App\Db\DatabaseLivro;

define('PG', 'Categorias');


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: listagemCategorias.php?status=error');
    exit;
}

$obCategoria= Categoria::getCategorias($_GET['id']);


if(!$obCategoria instanceof Categoria){
    header('location: listagemCategorias.php?status=error');
    exit;
}


if(isset($_POST['excluirCategoria'])){

    $obCategoria->excluirCategoria();

    header('location: listagemCategorias.php');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/exclusaoCategoria.php';
include __DIR__ . '/includes/footer.php';
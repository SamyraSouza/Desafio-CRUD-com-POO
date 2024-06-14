<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Categoria;
define('TITLE', 'Editar Categoria');
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

if(isset($_POST['Nomes'])){

    $obCategoria->Nomes = $_POST['Nomes'];
    $obCategoria->atualizar();
    

    header('location: listagemCategorias.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulariocategorias.php';
include __DIR__ . '/includes/footer.php';